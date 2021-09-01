<?php

namespace App\Http\Controllers;

use App\Models\MpesaTransaction;
use App\Models\User;
use Carbon\Carbon;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MpesaController extends Controller
{

    public function generate_access_token(){
        $consumer_key = "sRhyevttVzO7ZJCRob5EdXYPPGQQf75L";
        $consumer_secret = "HlcYN4PJiUptwyX6";
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

        $curl = \curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);

        return $access_token->access_token;
    }

    public function lipa_na_mpesa_password()
    {
        $time = Carbon::rawParse('now')->format('YmdHms');
        $pass_key = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $business_code = 174379;

        return base64_encode($business_code.$pass_key.$time);
    }

    public function mpesa_stk_push(Request $request){
        $phone_number = $request->PhoneNumber;

        $url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";

        $curl = \curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$this->generate_access_token(), 'Content-Type:application/json'));

        $curl_post_data = [
            'BusinessShortCode' => 174379,
            'Password' => $this->lipa_na_mpesa_password(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => 1,
            'PartyA' => $phone_number,//254700861587,
            'PartyB' => 174379,
            'PhoneNumber' => $phone_number,//254700861587,
            'CallBackURL' => 'https://cyberdroid.mblog.co.ke/api/cyberdroid/save',
            'AccountReference' => "Cyberdroid LNP",
            'TransactionDesc' => "Testing stk push on sandbox"
        ];

        $encoded_date = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $encoded_date);

        curl_exec($curl);
    }

    public function save_transaction_details(Request $request){
        $trans_data = json_decode($request->getContent());
        $resultCode = $trans_data->Body->stkCallback->ResultCode;

        Storage::put('transactions.txt', $resultCode);

        if ($resultCode == 0){
            $merchantRequestID = $trans_data->Body->stkCallback->MerchantRequestID;
            $checkoutRequestID = $trans_data->Body->stkCallback->CheckoutRequestID;
            $resultDesc = $trans_data->Body->stkCallback->ResultDesc;
            $resultCode = $trans_data->Body->stkCallback->ResultCode;
            $callbackMetadata = $trans_data->Body->stkCallback->CallbackMetadata;
            $amount = $callbackMetadata->Item[0]->Value;
            $mpesaReceiptNumber = $callbackMetadata->Item[1]->Value;
            $transactionDate = $callbackMetadata->Item[2]->Value;
            $phoneNumber = $callbackMetadata->Item[3]->Value;

            $data = array(
                'mrId'=>$merchantRequestID,
                'crId'=>$checkoutRequestID,
                'cmd'=>$callbackMetadata,
                'amount'=>$amount,
                'mrNo'=>$mpesaReceiptNumber,
                'tdate'=>$transactionDate,
                'pNo'=>$phoneNumber
            );

            $mpesa = new MpesaTransaction();
            $mpesa->MerchantRequestID = $merchantRequestID;
            $mpesa->CheckoutRequestID = $checkoutRequestID;
            $mpesa->Amount = $amount;
            $mpesa->MpesaReceiptNumber = $mpesaReceiptNumber;
            $mpesa->TransactionDate = $transactionDate;
            $mpesa->PhoneNumber = $phoneNumber;

            $mpesa->save();

            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $user->merchant_id = $mpesaReceiptNumber;
            $user->update();
        }
    }
}
