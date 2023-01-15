<?php

if(isset($_POST['submit']))
{   
    if(isset($_POST['action']))
    {
        session_start();
        $action=$_POST['action'];
       
        switch ($action)
        {
         case 'consultrequest':
            consultrequest();
            break;
        case 'tedrequestone':
            tedrequestone();
            break;
        case 'tedrequesttwo':
            tedrequesttwo();
            break;
        case 'tedrequestthree':
            tedrequestthree();
            break;
        
        }
    }
}

function consultrequest()
{
    include './common.php';
    include './encdec.php';
    include './emailalert.php';

    $U_UID = strDecrypt($_POST['encuid']);
    $U_fname = $_POST['fname'];
    $U_lname = $_POST['lname'];
    $U_designation = $_POST['designation'];
    $U_email = $_POST['email'];
    $U_phone = $_POST['phone'];
    $U_organization = $_POST['organization'];
    $U_addr1 = $_POST['addr1'];
    $U_addr2 = $_POST['addr2'];
    $U_country = $_POST['country'];
    $U_city = $_POST['city'];
    $U_zip = $_POST['zip'];
    $U_field = $_POST['field'];
    $U_sector = $_POST['sector'];
    $U_note = $_POST['note'];

    date_default_timezone_set("Asia/Colombo");
    $datetime = date('ymdHis');
    $CURRENT_TIME = date("Y-m-d H:i:s");

    $ip = getclientipaddress();

    $UNIQ_ID = 'CON1_'. $datetime . '_' . $U_UID;

    $OUTPUT_VIEW ="ERROR";

    $INSERT_QRY = "INSERT INTO consult_request(uniq_id,uid,fname,lname,designation,email,phone,organization,addr1,
    addr2,country,city,zip,sector,field,note,crdate,ischeck,clientip) 
    VALUES ('$UNIQ_ID','$U_UID','$U_fname','$U_lname','$U_designation','$U_email','$U_phone','$U_organization','$U_addr1',
    '$U_addr2','$U_country','$U_city','$U_zip','$U_sector','$U_field','$U_note','$CURRENT_TIME','NO','$ip');";

        
    $INSERT_OK = executesql($INSERT_QRY);

    if($INSERT_OK == true) 
    {
        $EMAIL_MSG = 'You have new consult request from website (Reference No : '. $UNIQ_ID.')';

        $SEND_MAIL = sendcommonmail('info@bizaid.lk',$EMAIL_MSG);

        $OUTPUT_VIEW ="SUCCESS";
    }
    else
    {
        $OUTPUT_VIEW ="ERROR";
    }

    echo $OUTPUT_VIEW;
    return;

}

function tedrequestone()
{
    include './common.php';
    include './encdec.php';
    include './emailalert.php';

    $U_UID = strDecrypt($_POST['encuid']);
    $U_cname = $_POST['cname'];
    $U_industry = $_POST['industry'];
    $U_person = $_POST['person'];
    $U_email = $_POST['email'];
    $U_phone = $_POST['phone'];
    $U_field = $_POST['field'];
    $U_subject = $_POST['subject'];
    $U_method = $_POST['method'];
    $U_place = $_POST['place'];
    $U_count = $_POST['count'];
    $U_note = $_POST['note'];
    $U_facility = $_POST['facility'];
    

    date_default_timezone_set("Asia/Colombo");
    $datetime = date('ymdHis');
    $CURRENT_TIME = date("Y-m-d H:i:s");

    $ip = getclientipaddress();

    $UNIQ_ID = 'TED1_' . $datetime . '_' . $U_UID;

    $OUTPUT_VIEW ="ERROR";

    $INSERT_QRY = "INSERT INTO tedone_request(uniq_id,uid,cname,industry,person,email,phone,trainmethod,place,headcount,note,field,subject,facility,crdate,ischeck,clientip) 
    VALUES ('$UNIQ_ID','$U_UID','$U_cname','$U_industry','$U_person','$U_email','$U_phone','$U_method','$U_place','$U_count','$U_note','$U_field','$U_subject','$U_facility','$CURRENT_TIME','NO','$ip');";

        
    $INSERT_OK = executesql($INSERT_QRY);

    if($INSERT_OK == true) 
    {
        $EMAIL_MSG = 'You have new Training coordination request from website (Reference No : '. $UNIQ_ID.')';

        $SEND_MAIL = sendcommonmail('info@bizaid.lk',$EMAIL_MSG);

        $OUTPUT_VIEW ="SUCCESS";
    }
    else
    {
        $OUTPUT_VIEW ="ERROR";
    }

    echo $OUTPUT_VIEW;
    return;

}

function tedrequesttwo()
{
    include './common.php';
    include './encdec.php';
    include './emailalert.php';

    $U_UID = strDecrypt($_POST['encuid']);
    $U_cname = $_POST['cname'];
    $U_industry = $_POST['industry'];
    $U_person = $_POST['person'];
    $U_email = $_POST['email'];
    $U_phone = $_POST['phone'];
    $U_job = $_POST['job'];
    $U_note = $_POST['note'];
    

    date_default_timezone_set("Asia/Colombo");
    $datetime = date('ymdHis');
    $CURRENT_TIME = date("Y-m-d H:i:s");

    $ip = getclientipaddress();

    $UNIQ_ID = 'TED2_' . $datetime . '_' . $U_UID;

    $OUTPUT_VIEW ="ERROR";

    $INSERT_QRY = "INSERT INTO tedtwo_request(uniq_id,uid,cname,industry,person,email,phone,jobrole,note,crdate,ischeck,clientip) 
    VALUES ('$UNIQ_ID','$U_UID','$U_cname','$U_industry','$U_person','$U_email','$U_phone','$U_job','$U_note','$CURRENT_TIME','NO','$ip');";

        
    $INSERT_OK = executesql($INSERT_QRY);

    if($INSERT_OK == true) 
    {
        $EMAIL_MSG = 'You have new Competency Development Request from website (Reference No : '. $UNIQ_ID.')';

        $SEND_MAIL = sendcommonmail('info@bizaid.lk',$EMAIL_MSG);

        $OUTPUT_VIEW ="SUCCESS";
    }
    else
    {
        $OUTPUT_VIEW ="ERROR";
    }

    echo $OUTPUT_VIEW;
    return;

}

function tedrequestthree()
{
    include './common.php';
    include './encdec.php';
    include './emailalert.php';

    $U_UID = strDecrypt($_POST['encuid']);
    $U_cname = $_POST['cname'];
    $U_industry = $_POST['industry'];
    $U_person = $_POST['person'];
    $U_email = $_POST['email'];
    $U_phone = $_POST['phone'];
    $U_designation = $_POST['designation'];
    $U_compdesc = $_POST['compdesc'];
    $U_location = $_POST['location'];
    $U_jobrole = $_POST['jobrole'];
    $U_qualification = $_POST['qualification'];
    $U_experience = $_POST['experience'];
    $U_salary = $_POST['salary'];
    

    date_default_timezone_set("Asia/Colombo");
    $datetime = date('ymdHis');
    $CURRENT_TIME = date("Y-m-d H:i:s");

    $ip = getclientipaddress();

    $UNIQ_ID = 'TED3_' . $datetime . '_' . $U_UID;

    $OUTPUT_VIEW ="ERROR";

    $INSERT_QRY = "INSERT INTO tedthree_request(uniq_id,uid,cname,industry,person,email,phone,designation,compdesc,location,jobrole,qualification,experience,salary,crdate,ischeck,clientip) 
    VALUES ('$UNIQ_ID','$U_UID','$U_cname','$U_industry','$U_person','$U_email','$U_phone','$U_designation','$U_compdesc','$U_location','$U_jobrole','$U_qualification','$U_experience','$U_salary','$CURRENT_TIME','NO','$ip');";

        
    $INSERT_OK = executesql($INSERT_QRY);

    if($INSERT_OK == true) 
    {
        $EMAIL_MSG = 'You have new Competency Development Request from website (Reference No : '. $UNIQ_ID.')';

        $SEND_MAIL = sendcommonmail('info@bizaid.lk',$EMAIL_MSG);

        $OUTPUT_VIEW ="SUCCESS";
    }
    else
    {
        $OUTPUT_VIEW ="ERROR";
    }

    echo $OUTPUT_VIEW;
    return;

}

function getuserimage()
{
    include './common.php';
    include './encdec.php';

    $U_UID = strDecrypt($_POST['encuid']);

    $OUTPUT_FN ="default.jpg";

    $return_result = selectqryexecute("SELECT userimage FROM app_history WHERE uid='$U_UID';");

    if ($return_result->num_rows == 1) 
    {
        while($row = $return_result->fetch_assoc()) 
        {
            $OUTPUT_FN = $row["userimage"];
        }
    }
    else
    {
        $OUTPUT_FN = "default.jpg";
    }

    echo $OUTPUT_FN;
    return;

}

?>