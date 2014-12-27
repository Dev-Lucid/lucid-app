<?php

class lucid_controller__users extends lucid_controller_data_table
{
    function build()
    {
        global $lucid;

        # Create the table object. The parameters are:
        # 1) string. the title of the table
        # 2) string. the url for the refresh function.
        # 3) object. a model that is used for the data for the table. 
        $table = $lucid->html->data_table('Sample Table','users/refresh',$lucid->db->users());
        
        # Adding the columns to the table. The parameters are: 
        # 1) string. the column header 
        # 2) string. the name of the column in the database
        # 3) boolean. true if the column is sortable. defaults to 
        # 4) string. width of the column. 
        # 5) function. an anonymous function used to render the column data. This is entirely optional
        #       
        $table->add_column($lucid->html->data_column('Email','email',true,'40%'));
        $table->add_column($lucid->html->data_column('First Name','first_name',true,'30%'));
        $table->add_column($lucid->html->data_column('Last Name','last_name',true,'30%'));

        # add a simple search filter that can search the email, first name, or last name columns
        $table->add_filter($lucid->html->data_filter_search('search','email||first_name||last_name'));

        # more complicated. Add a select field that filters the table based on the org_id column.
        # first we have to construct an array of arrays for the select data.
        # each element of the array contains an array with 2 or 3 elements. 
        # the first element is the value for the option tag that will be generated based on that array index.
        # -1 represents no value, and if the user selects an option for which the value is -1, the filter will
        # not be applied at all.
        # the second element is the text used for the option tag.
        # the third element which is optional is a boolean. If a true is passed, that option will be selected by default.
        # notably this does NOT apply the filter by default, so you should probably add additional logic to apply this. Or maybe 
        # I'll get around to fixing that >_>;;
        # 
        $org_filter_data = [[-1,'Show from all']];
        $orgs = $lucid->db->organizations()->select();
        foreach($orgs as $org)
        {
            $org_filter_data[] = [$org['org_id'],$org['name']];
        }

        # finally, add the select filter to the table. There are 4 parameters:
        # 1) string. the name of the field in the html, also used for the name passed to the server when changed
        # 2) string. the name of the database column that this should filter on
        # 3) string. a prefix for the text in the option
        # 4) array. the data used for the select list. See explanation above for the structure of this array.
        $table->add_filter($lucid->html->data_filter_select('org_id','org_id','Organization',$org_filter_data));
        
        return $table;
    }
}

?>