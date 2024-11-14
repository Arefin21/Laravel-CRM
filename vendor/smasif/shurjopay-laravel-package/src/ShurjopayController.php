<?php

namespace smasif\ShurjopayLaravelPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShurjopayController extends Controller
{
    public function response(Request $request ,$userid ,$seminar_id, $name, $email, $type)
    {
        $server_url = config('shurjopay.server_url');
        $response_encrypted = $request->spdata;
        $response_decrypted = file_get_contents($server_url . "/merchant/decrypt.php?data=" . $response_encrypted);
        $data = simplexml_load_string($response_decrypted) or die("Error: Cannot create object");
        $tx_id = $data->txID;
        $bank_tx_id = $data->bankTxID;
        $amount = $data->txnAmount;
        $bank_status = $data->bankTxStatus;
        $sp_code = $data->spCode;
        $sp_code_des = $data->spCodeDes;
        $sp_payment_option = $data->paymentOption;
        $status = "";
        switch ($sp_code) {
            case '000':
                $res = array('status' => true, 'msg' => 'Action Successful');
                $status = "Success";
                break;
            case '001':
                $status = "Failed";
                $res = array('status' => false, 'msg' => 'Action Failed');
                break;
        }

        $success_url = $request->get('success_url');


        if ($success_url) {
            header("location:" . $success_url . "?status={$status}&msg={$res['msg']}&tx_id={$tx_id}&bank_tx_id={$bank_tx_id}"
                . "&amount={$amount}&bank_status={$bank_status}&sp_code={$sp_code}" .
                "&sp_code_des={$sp_code_des}&sp_payment_option={$sp_payment_option}");
        }
        if($type =='nonseminar') {
            if ($res['status']) {
//                echo "Success";
                return redirect(route('nonseminar-payment-submission', ['id' => $userid, 'seminar_id' => $seminar_id, 'name' => $name, 'email' => $email, 'amount' => $amount, 'tx_id' => $tx_id]));
                die();
            } else {
//                echo "Fail";
                return redirect(route('non-seminar-payment_faild'));
//                return redirect(route('nonseminar-payment-submission', ['id' => $userid, 'seminar_id' => $seminar_id, 'name' => $name, 'email' => $email, 'amount' => $amount, 'tx_id' => $tx_id]));
                die();
            }
        }

        if($type =='seminar') {
            if ($res['status']) {
//                echo "Success";
                return redirect(route('seminar-payment-submission', ['id' => $userid, 'seminar_id' => $seminar_id, 'name' => $name, 'email' => $email, 'amount' => $amount, 'tx_id' => $tx_id]));
                die();
            } else {
//                echo "Fail";
                return redirect(route('seminar-payment_faild'));

//                return redirect(route('nonseminar-payment-submission', ['id' => $userid, 'seminar_id' => $seminar_id, 'name' => $name, 'email' => $email, 'amount' => $amount, 'tx_id' => $tx_id]));
                die();
            }
        }


    }
function curl_get_file_contents($URL)
{
    $c = curl_init();
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_URL, $URL);
    $contents = curl_exec($c);
    curl_close($c);

    if ($contents) return $contents;
    else return FALSE;
}

    public function responsesubfee(Request $request ,$userid ,$subscriptionid, $name, $email, $year, $subscriber_number, $type)
    {
        $server_url = config('shurjopay.server_url');
        $response_encrypted = $request->spdata;
        $response_decrypted = file_get_contents($server_url . "/merchant/decrypt.php?data=" . $response_encrypted);
        $data = simplexml_load_string($response_decrypted) or die("Error: Cannot create object");
        $tx_id = $data->txID;
        $bank_tx_id = $data->bankTxID;
        $amount = $data->txnAmount;
        $bank_status = $data->bankTxStatus;
        $sp_code = $data->spCode;
        $sp_code_des = $data->spCodeDes;
        $sp_payment_option = $data->paymentOption;
        $status = "";
        switch ($sp_code) {
            case '000':
                $res = array('status' => true, 'msg' => 'Action Successful');
                $status = "Success";
                break;
            case '001':
                $status = "Failed";
                $res = array('status' => false, 'msg' => 'Action Failed');
                break;
        }

        $success_url = $request->get('success_url');


        if ($success_url) {
            header("location:" . $success_url . "?status={$status}&msg={$res['msg']}&tx_id={$tx_id}&bank_tx_id={$bank_tx_id}"
                . "&amount={$amount}&bank_status={$bank_status}&sp_code={$sp_code}" .
                "&sp_code_des={$sp_code_des}&sp_payment_option={$sp_payment_option}");
        }
        if($type =='nonsubfee') {
            if ($res['status']) {
//                echo "Success";
                return redirect(route('nonsubfees-payment-submission',['id'=>$userid, 'subscriptionid'=>$subscriptionid, 'name'=>$name , 'email'=>$email,'year'=>$year, 'subscriber_number'=>$subscriber_number,'amount'=>$amount,'tx_id'=>$tx_id]));
                die();
            } else {
//                echo "Fail";
                return redirect(route('non-seminar-payment_faild'));

//                return redirect(route('nonseminar-payment-submission', ['id' => $userid, 'seminar_id' => $seminar_id, 'name' => $name, 'email' => $email, 'amount' => $amount, 'tx_id' => $tx_id]));
                die();
            }
        }

        if($type =='subfee') {
            if ($res['status']) {
//                echo "Success";
                return redirect(route('subfees-payment-submission',['id'=>$userid, 'subscriptionid'=>$subscriptionid, 'name'=>$name , 'email'=>$email,'year'=>$year, 'subscriber_number'=>$subscriber_number,'amount'=>$amount,'tx_id'=>$tx_id]));
                die();
            } else {
//                echo "Fail";
                return redirect(route('seminar-payment_faild'));

//                return redirect(route('nonseminar-payment-submission', ['id' => $userid, 'seminar_id' => $seminar_id, 'name' => $name, 'email' => $email, 'amount' => $amount, 'tx_id' => $tx_id]));
                die();
            }
        }


    }


}
