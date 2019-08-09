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

    echo "<select id='projects' onchange='changeproject()'>";
    echo "</select>";

    echo "<select id='functions'>";
    echo "</select>";

    echo "<button onclick='codiad.modal.unload()'; return false;>Cancel</button>";
    echo "<button onclick='build()'; return false;>Build</button>";

    echo "<script>";
    echo "var path='" . $_GET["path"] ."';";
    echo "</script>";
?>

<script>
        function build() {
		var fname = document.getElementById("functions").value;
		$.get(path+"build.php"+"?fname="+fname, function(data) {alert(data);});
	};
	function changeproject() {
		var select = document.getElementById("functions");
		var length = select.options.length;
		for (i = length; i >= 0; i--) {
			//select.options[i] = null;
			select.remove(i);
		}
		console.log("-----------")
		var projname = document.getElementById("projects").value;
		$.get(path+"request_function_data.php"+"?project="+projname, function(data) {
			for (var i = 0; i < data.split("\n").length; i++) {
				if (data.split("\n")[i].length) {
           	                	console.log(data.split("\n")[i]);
					var option = document.createElement("option");
					option.value = data.split("\n")[i];
					option.text = data.split("\n")[i];
					select.appendChild(option);
                        	}
			}
			console.log("-----------")
		});
	}

	var myParent = document.body;
	$.get(path+"request_project_data.php", function(data) {
		var myParent = document.body;
		var selectList = document.getElementById("projects");
		//selectList.id = "projects";
		//myParent.appendChild(selectList);
		//console.log(data);
		console.log(data.split("\n")[0]);
		console.log(data.split("\n")[1]);
		console.log(data.split("\n")[2]);
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
		var selected = document.getElementById("projects");
		console.log( selected.value );
		var selvar = selected.value;
		$.get(path+"request_function_data.php"+"?project="+selvar, function(data) {
			console.log(data);
			var selectList = document.getElementById("functions");
			for (var i = 1; i < data.split("\n").length; i++) {
	                        if (data.split("\n")[i].length) {
        	                        console.log(data.split("\n")[i]);
                	                var option = document.createElement("option");
                        	        option.value = data.split("\n")[i];
	                                option.text = data.split("\n")[i];
        	                        selectList.appendChild(option);
                	        }
			}
		});
	});


</script>

