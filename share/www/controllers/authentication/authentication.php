<?php

class lucid_controller__authentication extends lucid_controller
{
    function check_login()
    {
        global $lucid;
        lucid::log('called');
        lucid::log(print_r($_REQUEST,true));
        $user = $lucid->db->users()->where('email',$_REQUEST['email'])->first();
        if(password_verify(trim($_REQUEST['password']),$user->password))
        {
            lucid::log('password matched!');
            if($user->org_id === 1)
            {
                # this is a member of the admin org, redirect to admin dashboard
            }
            else
            {
                # this is NOT a member of the admin org, redirect to standard dashboard

            }
        }
        else
        {
            lucid::log('password did not match!');

        }
    }
}

?>