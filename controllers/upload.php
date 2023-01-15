<?php

if(isset($_POST['submit']))
{   
    if(isset($_POST['action']))
    {
        session_start();
        $action=$_POST['action'];
        
        switch ($action)
        {
        case 'createnewdoc':

            newdoccreate();
            break;
        case 'newfileupload':

            newfileupload();
            break;
        case 'setpublic':

            makepublic();
            break;
        case 'setprivate':

            makeprivate();
            break;
        case 'updatedetails':

            docupdate();
            break;
        case 'filedelete':

            removefile();
            break;
        case 'docdelete':

            removedoc();
            break;
        case 'getuploadfilelist':

            getuploadfilelist();
            break;
        case 'docpublish':

            makedocpublish();
            break;
        case 'uploadfilesavailable':

            getuploadfilesavailable();
            break;
            
        }
    }
}

function newdoccreate()
{ 

    include './common.php';
    include './encdec.php';

    
    $N_UID = strDecrypt($_POST['encuid']);
    $N_TITLE = $_POST['val_title'];
    $N_DESC = $_POST['val_desc'];
    $N_TAGS = $_POST['val_tags'];
    date_default_timezone_set("Asia/Colombo");
    $CURRENT_TIME = date("Y-m-d H:i:s");
    $NEWFID = getnewfileid();
    

    $dt_username = selectqryexecute("SELECT * FROM app_users WHERE uid='$N_UID' AND active='1' AND isuploader='1';");

    if ($dt_username->num_rows == 1)
    {
        

        $INSERT_QRY = "INSERT INTO files_master(uid,filetitle,filedesc,filetag,filecrdate,filelcdate,filecode,filestatus,ispublic,isactive,isdelete) VALUES('$N_UID','$N_TITLE','$N_DESC','$N_TAGS','$CURRENT_TIME','$CURRENT_TIME','$NEWFID','Edit','0','1','0');";
        
        $INSERT_OK = executesql($INSERT_QRY);

        if($INSERT_OK == true)
        {
            
            // Return User Create Success
            echo $NEWFID;
            return;
        }
        else
        {
            // Return Error Found In Insert
            echo "1";
            return;
        }
    }
    else
    {
        // User Don't Have Permission
        echo "0";
        return;
    }

}

function docupdate()
{ 

    include './common.php';
    include './encdec.php';

    
    $U_UID = strDecrypt($_POST['encuid']);
    $DOC_ID = $_POST['fileid'];
    $DOC_CODE = $_POST['filecode'];
    $VAL_TITLE = $_POST['val_title'];
    $VAL_DESC = $_POST['val_desc'];
    $VAL_TAGS = $_POST['val_tags'];
    $VAL_SECOND = $_POST['val_second'];
    date_default_timezone_set("Asia/Colombo");
    $CURRENT_TIME = date("Y-m-d H:i:s");

    $dt_userowndoc = selectqryexecute("SELECT * FROM files_master WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0';");

    if ($dt_userowndoc->num_rows == 1) 
    {
        $Sql_updateqry = "UPDATE files_master SET filetitle='$VAL_TITLE',filedesc='$VAL_DESC',filetag='$VAL_TAGS',filecodetwo='$VAL_SECOND',filelcdate='$CURRENT_TIME' WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0';";
        
        $UPDATE_OK = executesql($Sql_updateqry);

        if($UPDATE_OK == true)
        {
            $ip = getclientipaddress();
 
            $sqlinsert_qry = "INSERT INTO app_history(uid,activity,reason,dateandtime,ip) VALUES ('$U_UID','UPLOAD','User update document details. DOC CODE $DOC_CODE','$CURRENT_TIME','$ip');";
            $insert_val = executesql($sqlinsert_qry);
            // Return Update Success
            echo "2";
            return;
        }
        else
        {
            // Return Error Found In Update
            echo "1";
            return;
        }
    }
    else
    {
        // You Dont Have Permission
        echo "0";
        return;
    }
     

}

function newfileupload()
{
    include './common.php';
    include './encdec.php';

    $U_UID = strDecrypt($_POST['encuid']);
    $DOC_ID = $_POST['fileid'];
    $DOC_CODE = $_POST['filecode'];

    $dt_userowndoc = selectqryexecute("SELECT * FROM files_master WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0';");

    if ($dt_userowndoc->num_rows == 1) 
    {
        
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        
        $originalnamewext = $_FILES['file']['name'];
        $removeext_oriname = str_replace('.'.$ext,"",$originalnamewext);
        $limitedoriname = substr($removeext_oriname, 0, 244);
        $originalname = $limitedoriname.'.'.$ext;

        $filesize = $_FILES['file']['size'];
        $RANDOM_NAME = getnewfileid();
        $UP_FILENAME = $DOC_ID.'_'.$RANDOM_NAME.'.'.$ext;

        // Create directory if it does not exist
        if(!is_dir("../files/upload/".$DOC_CODE."/")) {
            mkdir("../files/upload/".$DOC_CODE."/");
        }

                move_uploaded_file($_FILES["file"]["tmp_name"], "../files/upload/".$DOC_CODE."/" . $UP_FILENAME);
 
                date_default_timezone_set("Asia/Colombo");
                $CURRENT_TIME = date("Y-m-d H:i:s");

                $UPDATE_QRY = "UPDATE files_master SET filelcdate='$CURRENT_TIME' WHERE filestatus <> 'Edit' AND fileid='$DOC_ID' AND uid='$U_UID' AND filecode='$DOC_CODE';";

                $UPDATE_OK = executesql($UPDATE_QRY);

                if($UPDATE_OK == true)
                {
                    $sqlinsertfile_qry = "INSERT INTO files_upload(fileid,fileoriname,filename,fileexet,filesize,filepath,uploaddt,downcount) VALUES ('$DOC_ID','$originalname','$UP_FILENAME','$ext','$filesize','','$CURRENT_TIME','0');";
                    $insertfile_val = executesql($sqlinsertfile_qry);

                    $ip = getclientipaddress();

                    $sqlinsert_qry = "INSERT INTO app_history(uid,activity,reason,dateandtime,ip) VALUES ('$U_UID','UPLOAD','User Upload New File In To DOC CODE $DOC_CODE','$CURRENT_TIME','$ip');";
                    $insert_val = executesql($sqlinsert_qry);
                    // Return User Create Success
                    echo "2";
                    return;
                }
                else
                {
                    // Return Error Found In Insert
                    echo "1";
                    return;
                }

    }
    else
    {
        // Return Username not found in Database
        echo "0";
        return;
    }
}

function makedocpublish()
{
    include './common.php';
    include './encdec.php';

    $U_UID = strDecrypt($_POST['encuid']);
    $DOC_ID = $_POST['fileid'];
    $DOC_CODE = $_POST['filecode'];
    date_default_timezone_set("Asia/Colombo");
    $CURRENT_TIME = date("Y-m-d H:i:s");

    $dt_userowndoc = selectqryexecute("SELECT * FROM files_master WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0';");

    if ($dt_userowndoc->num_rows == 1) 
    {
        $Sql_updateqry = "UPDATE files_master SET filestatus='Publish',filelcdate='$CURRENT_TIME' WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0' AND filestatus='Edit';";
        
        $UPDATE_OK = executesql($Sql_updateqry);

        if($UPDATE_OK == true)
        {
            $ip = getclientipaddress();

            $sqlinsert_qry = "INSERT INTO app_history(uid,activity,reason,dateandtime,ip) VALUES ('$U_UID','UPLOAD','User publish document. DOC CODE $DOC_CODE','$CURRENT_TIME','$ip');";
            $insert_val = executesql($sqlinsert_qry);
            // Return Update Success
            echo "2";
            return;
        }
        else
        {
            // Return Error Found In Update
            echo "1";
            return;
        }
    }
    else
    {
        // Return Not Permission
        echo "0";
        return;
    }

}

function makepublic()
{
    include './common.php';
    include './encdec.php';

    $U_UID = strDecrypt($_POST['encuid']);
    $DOC_ID = $_POST['fileid'];
    $DOC_CODE = $_POST['filecode'];
    date_default_timezone_set("Asia/Colombo");
    $CURRENT_TIME = date("Y-m-d H:i:s");

    $dt_userowndoc = selectqryexecute("SELECT * FROM files_master WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0';");

    if ($dt_userowndoc->num_rows == 1) 
    {
        $Sql_updateqry = "UPDATE files_master SET ispublic='1',filelcdate='$CURRENT_TIME' WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0';";
        
        $UPDATE_OK = executesql($Sql_updateqry);

        if($UPDATE_OK == true)
        {
            $ip = getclientipaddress();

            $sqlinsert_qry = "INSERT INTO app_history(uid,activity,reason,dateandtime,ip) VALUES ('$U_UID','UPLOAD','User change visible to public as DOC CODE $DOC_CODE','$CURRENT_TIME','$ip');";
            $insert_val = executesql($sqlinsert_qry);
            // Return Update Success
            echo "2";
            return;
        }
        else
        {
            // Return Error Found In Update
            echo "1";
            return;
        }
    }
    else
    {
        // Return Not Permission
        echo "0";
        return;
    }

}

function makeprivate()
{
    include './common.php';
    include './encdec.php';

    $U_UID = strDecrypt($_POST['encuid']);
    $DOC_ID = $_POST['fileid'];
    $DOC_CODE = $_POST['filecode'];
    date_default_timezone_set("Asia/Colombo");
    $CURRENT_TIME = date("Y-m-d H:i:s");

    $dt_userowndoc = selectqryexecute("SELECT * FROM files_master WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0';");

    if ($dt_userowndoc->num_rows == 1) 
    {
        $Sql_updateqry = "UPDATE files_master SET ispublic='0',filelcdate='$CURRENT_TIME' WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0';";
        
        $UPDATE_OK = executesql($Sql_updateqry);

        if($UPDATE_OK == true)
        {
            $ip = getclientipaddress();

            $sqlinsert_qry = "INSERT INTO app_history(uid,activity,reason,dateandtime,ip) VALUES ('$U_UID','UPLOAD','User change visible to private as DOC CODE $DOC_CODE','$CURRENT_TIME','$ip');";
            $insert_val = executesql($sqlinsert_qry);
            // Return Update Success
            echo "2";
            return;
        }
        else
        {
            // Return Error Found In Update
            echo "1";
            return;
        }
    }
    else
    {
        // Return Not Permission
        echo "0";
        return;
    }
}

function removefile()
{
    include './common.php';
    include './encdec.php';

    $U_UID = strDecrypt($_POST['encuid']);
    $DOC_ID = $_POST['fileid'];
    $DOC_CODE = $_POST['filecode'];
    $D_FILEID = strDecrypt($_POST['downfileid']);
    date_default_timezone_set("Asia/Colombo");
    $CURRENT_TIME = date("Y-m-d H:i:s");

    $dt_userowndoc = selectqryexecute("SELECT * FROM files_master WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0';");

    if ($dt_userowndoc->num_rows == 1) 
    {
        $Sql_updateqry = "UPDATE files_master SET filelcdate='$CURRENT_TIME' WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0';";
        
        $UPDATE_OK = executesql($Sql_updateqry);

        if($UPDATE_OK == true)
        {
            $Sql_selectqry = "SELECT * FROM files_upload WHERE fileid='$DOC_ID' AND fileupid='$D_FILEID';";
        
            $SELECT_RESULT = selectqryexecute($Sql_selectqry);

            if($SELECT_RESULT->num_rows > 0)
            {

                while($row_set = $SELECT_RESULT->fetch_assoc()) 
                {
                    $filetodelete = '../files/upload/'.$DOC_CODE.'/'.$row_set["filename"]; //get the filename
                    unlink($filetodelete); //delete it

                    $sqldelete_qry = "DELETE FROM files_upload WHERE fileupid='$D_FILEID' AND fileid='$DOC_ID';";
                    $delete_val = executesql($sqldelete_qry);
        
                    $ip = getclientipaddress();
        
                    $sqlinsert_qry = "INSERT INTO app_history(uid,activity,reason,dateandtime,ip) VALUES ('$U_UID','UPLOAD','User delete file in DOC CODE $DOC_CODE','$CURRENT_TIME','$ip');";
                    $insert_val = executesql($sqlinsert_qry);
                    // Return Update Success
                    echo "3";
                    return;
                }
            }
            else
            {
                echo "2"; // File Not In Database
            }

            
        }
        else
        {
            // Return Error Found In Update
            echo "1";
            return;
        }
    }
    else
    {
        // Return Not Permission
        echo "0";
        return;
    }
}

function removedoc()
{
    include './common.php';
    include './encdec.php';

    $U_UID = strDecrypt($_POST['encuid']);
    $DOC_ID = strDecrypt($_POST['fileid']);
    $DOC_CODE = strDecrypt($_POST['filecode']);
    date_default_timezone_set("Asia/Colombo");
    $CURRENT_TIME = date("Y-m-d H:i:s");

    $dt_userowndoc = selectqryexecute("SELECT * FROM files_master WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0';");

    if ($dt_userowndoc->num_rows == 1) 
    {
        $Sql_updateqry = "UPDATE files_master SET ispublic='0',isactive='0',isdelete='1',filestatus='Delete',filelcdate='$CURRENT_TIME' WHERE fileid='$DOC_ID' AND filecode='$DOC_CODE' AND uid='$U_UID' AND isactive='1' AND isdelete='0';";
        
        $UPDATE_OK = executesql($Sql_updateqry);

        if($UPDATE_OK == true)
        {
            $Sql_selectqry = "SELECT * FROM files_upload WHERE fileid='$DOC_ID';";
        
            $SELECT_RESULT = selectqryexecute($Sql_selectqry);

            if($SELECT_RESULT->num_rows > 0)
            {

                while($row_set = $SELECT_RESULT->fetch_assoc()) 
                {
                    $filetodelete = '../files/upload/'.$DOC_CODE.'/'.$row_set["filename"]; //get the filename
                    unlink($filetodelete); //delete it

                    $sqldelete_qry = "DELETE FROM files_upload WHERE fileupid='$D_FILEID' AND fileid='$DOC_ID';";
                    $delete_val = executesql($sqldelete_qry);
        
                    
                }

                    $ip = getclientipaddress();
        
                    $sqlinsert_qry = "INSERT INTO app_history(uid,activity,reason,dateandtime,ip) VALUES ('$U_UID','UPLOAD','User delete entire document : DOC CODE $DOC_CODE','$CURRENT_TIME','$ip');";
                    $insert_val = executesql($sqlinsert_qry);
                    // Return Update Success
                    echo "3";
                    return;
            }
            else
            {
                echo "2"; // File Not In Database
            }

            
        }
        else
        {
            // Return Error Found In Update
            echo "1";
            return;
        }
    }
    else
    {
        // Return Not Permission
        echo "0";
        return;
    }
}

function getuploadfilelist()
{
    include './common.php';
    include './encdec.php';

    $DOC_ID = strDecrypt($_POST['docid']);
    $UID_ENC = $_POST['encuid'];
    $VAL_DOC_CODE = strDecrypt($_POST['doccode']);

    $OUTPUT_VIEW ="";

    $SQL_SELECT = "SELECT * FROM files_upload WHERE fileid='$DOC_ID' ORDER BY fileupid DESC;";

    $return_result = selectqryexecute($SQL_SELECT);

    if ($return_result->num_rows > 0) 
    {
        while($row = $return_result->fetch_assoc()) 
        {
            $OUTPUT_VIEW = $OUTPUT_VIEW . '<div class="alert alert-secondary" role="alert"><p class="text-dark">'.$row["fileoriname"].'</p><button onClick="filedelete(\''.strEncrypt($row["fileupid"]).'\');" class="btn btn-sm btn-danger">DELETE</button> <a href="filedownload.php?uid='.$UID_ENC.'&fid='.strEncrypt($row["fileupid"]).'&fcode='.strEncrypt($VAL_DOC_CODE).'" target="_blank" class="btn btn-sm btn-primary">DOWNLOAD</a></div>';
        }
    }
    else
    {
        $OUTPUT_VIEW = '<div>Data Not Found.....</div>';
    }

    echo $OUTPUT_VIEW;
    return;

}

function getuploadfilesavailable()
{
    include './common.php';
    include './encdec.php';

    $DOC_ID = $_POST['fileid'];

    $dt_userowndoc = selectqryexecute("SELECT * FROM files_upload WHERE fileid='$DOC_ID';");

    if ($dt_userowndoc->num_rows > 0) 
    {
        echo "1";
        return;
    }
    else
    {
        // Return Not Permission
        echo "0";
        return;
    }
}

?>