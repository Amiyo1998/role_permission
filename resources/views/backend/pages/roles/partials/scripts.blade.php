<script>
    $("#checkPermissionAll").click(function(){
      if($(this).is(":checked")){
          //Check all checkbox
          $('input[type = checkbox]').prop('checked', true);
      }else{
           //Un Check all checkbox
           $('input[type = checkbox]').prop('checked', false);
      }
    })

    function checkPermissionByGroup(className, checkThis){
              const groupIdName = $("#"+checkThis.id);
              const classCheckBox = $('.'+className+' input');
              if(groupIdName.is(':checked')){
                   classCheckBox.prop('checked', true);
               }else{
                   classCheckBox.prop('checked', false);
               }
               implementAllChecked();
           }

    function checkSinglePermission(groupClassName, groupID, countTotalPermission){
        const classCheckbox = $('.' +groupClassName+ 'input');
        const groupIdCheckBox = $("#"+groupID);

        if ($('.'+groupClassName+ ' input:checked').length == countTotalPermission) {
            groupIdCheckBox.prop('checked', true);
        } else {
            groupIdCheckBox.prop('checked', false);
        }

        implementAllChecked();
    }

    function implementAllChecked(){
        const countPermissions = {{ count($all_permissions)}};
        const countPermissionsGroups = {{ count($permission_groups)}};
        if ($('input[type = "checkbox"]:checked').length >= (countPermissions + countPermissionsGroups) ) {
            $("#checkPermissionAll").prop('checked', true);
        }else {
            $("#checkPermissionAll").prop('checked', false);
        }
    }
  </script>
