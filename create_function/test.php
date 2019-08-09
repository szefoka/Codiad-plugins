<?php
    /*
    *  Copyright (c) Codiad & Kent Safranski (codiad.com), distributed
    *  as-is and without warranty under the MIT License. See 
    *  [root]/license.txt for more. This information must remain intact.
    */
    require_once('../../common.php');
    
    //////////////////////////////////////////////////////////////////
    // Verify Session or Key
    //////////////////////////////////////////////////////////////////
    
    checkSession();
    /*exec("ls -l /bitnami/codiad/workspace/ | egrep '^d' | awk '{print $9}'", $outputArray);
    echo "<select id='projects' onchange='changeproject()'>";
    foreach ($outputArray as $item) {
         //echo "<option value="+"\"volvo\""+">"+volvo+"</option>";
         print "<option value='".$item."'>" . $item . "</option>";
    }
    echo "</select>";*/

    echo "<p>Function name</p>";
    echo "<input type='text' id=fname>";

    echo "<p>Select a project</p>";
    echo "<select id='projname'>";
    echo "</select>";

    echo "<p>Function lang</p>";
    echo "<select id='fntype'>";
    echo "</select>";

    echo "<button onclick='codiad.modal.unload()'; return false;>Cancel</button>";
    echo "<button onclick='create_function()'; return false;>Create</button>";

    echo "<script>";
    echo "var path='" . $_GET["path"] ."';";
    echo "</script>";
?>

<script>
	function create_function() {
		projname = document.getElementById("projname").value;
		fname = document.getElementById("fname").value;
		ftype = document.getElementById("fntype").value;
		$.get(path+"create_function.php"+"?fname="+fname+"&ftype="+ftype+"&projname="+projname, function(data) {
			alert(data);
			codiad.filemanager.rescan($('#context-menu').attr(" "));
		});
	}

	$.get(path+"request_projects.php", function(data) {
		var selectList = document.getElementById("projname");
		for (var i = 1; i < data.split("\n").length; i++) {
                        console.log(i);
                        if (data.split("\n")[i].length) {
                                console.log(data.split("\n")[i]);
                                var option = document.createElement("option")
                                option.value = data.split("\n")[i];
                                option.text = data.split("\n")[i];
                                selectList.appendChild(option);
                        }
                }
		return;
	});

	$.get(path+"request_fntype.php", function(data) {
		var selectList = document.getElementById("fntype");
		for (var i = 1; i < data.split("\n").length; i++) {
                        //console.log(i);
                        if (data.split("\n")[i].length) {
                                //console.log(data.split("\n")[i]);
                                var option = document.createElement("option")
                                option.value = data.split("\n")[i];
                                option.text = data.split("\n")[i];
                                selectList.appendChild(option);
                        }
                }
	});


</script>

