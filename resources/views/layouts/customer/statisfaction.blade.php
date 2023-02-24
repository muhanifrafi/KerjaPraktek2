<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Welcome To Customer Statisfaction Survey 2023</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="frontend/assets/statisfaction/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="frontend/assets/statisfaction/css/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="frontend/assets/statisfaction/css/animate.css" rel="stylesheet" />

        <!-- Morris Chart Css-->
        <link href="frontend/assets/statisfaction/css/morris.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="frontend/assets/statisfaction/css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="frontend/assets/statisfaction/css/themes/all-themes.css" rel="stylesheet" />	


        <!-- Jquery Core Js -->
        <script src="frontend/assets/statisfaction/js/jquery-1.10.2.js"></script>
        <script src="frontend/assets/statisfaction/js/jquery.form.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="frontend/assets/statisfaction/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="frontend/assets/statisfaction/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="frontend/assets/statisfaction/js/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="frontend/assets/statisfaction/js/waves.js"></script>

        <!-- Jquery CountTo Plugin Js -->
        <script src="frontend/assets/statisfaction/js/jquery.countTo.js"></script>

        <!-- Morris Plugin Js -->
        <script src="frontend/assets/statisfaction/js/raphael.js"></script>
        <script src="frontend/assets/statisfaction/js/morris.js"></script>

        <!-- ChartJs -->
        <script src="frontend/assets/statisfaction/js/Chart.bundle.js"></script>

        <!-- Custom Js -->
        <script src="frontend/assets/statisfaction/js/admin.js"></script>

        <!-- Input Mask Plugin Js -->
        <script src="frontend/assets/statisfaction/js/jquery.inputmask.bundle.js"></script>

        <!-- TinyMCE -->
        <script src="frontend/assets/statisfaction/tinymce/tinymce.js"></script>
    </head>
    @include('includes.style')
    
    
    <script  type="text/javascript">
    function nextQuest(id, id2, id3, id4, displaytr) {
        for (var x = 0; x < id; x++) {
            document.getElementById('part_' + x).style.display = "none";
            document.getElementById('btnNext_' + x).style.display = "none";
        }
        if (id2 != 0) {
            var id2before = id2 - 1;
            document.getElementById('partcat_' + id2before).style.display = "none";
        }
        for (var x1 = 2; x1 < id4; x1++) {
            document.getElementById('commentpart_' + x1).style.display = "none";
        }
        if (id4 == '60') {
            document.getElementById('commentpart_' + id4).style.display = "block";
        }
        if (displaytr == 'block') {
            document.getElementById('commentpart_' + id4).style.display = displaytr;
        }
//        if (id3 * 1 != 0) {
//            var id3before = id3 * 1 - 1;
//            document.getElementById('partsubcat_' + id3before).style.display = "none";
//            document.getElementById('partsubcat_' + id3).style.display = "block";
//        }
//        if (id4) {
//            var id4before = id4 * 1 - 1;
//            if (id4before == '-1') {
//                document.getElementById('commentpart_' + id4).style.display = "block";
//            } else {
//                document.getElementById('commentpart_' + id4before).style.display = "none";
//                document.getElementById('commentpart_' + id4).style.display = "block";
//            }
//        }
        document.getElementById('part_' + id).style.display = "block";
        document.getElementById('btnNext_' + id).style.display = "block";
        document.getElementById('partcat_' + id2).style.display = "block";
    }
    function beforeQuest(id, id2, id4) {
        for (var x = id2 - 1; x > id; x--) {
            document.getElementById('part_' + x).style.display = "none";
            document.getElementById('btnNext_' + x).style.display = "none";
        }
        document.getElementById('commentpart_' + id4).style.display = "none";
        document.getElementById('part_' + id).style.display = "block";
        document.getElementById('btnNext_' + id).style.display = "block";
    }
    function open_url_to_div(pageAction) {
        $.get(pageAction, function(data) {
            $("#tableview").html(data); 
			
            var $demoMaskedInput = $('.demo-masked-input');
            //Date
            $demoMaskedInput.find('.date').inputmask('dd/mm/yyyy', {placeholder: '__/__/____'});
            //TinyMCE
            tinymce.init({
                selector: "textarea",
                theme: "modern",
                height: 10,
                width: 1200,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = 'tinymce';
        });
    }
    function prosesNext1() {
        jQuery("#frm_identity").ajaxSubmit(identity_opt);
    }
    var identity_opt = {
        target: '#tableview',
        url: 'surveymodule/survey/formsurvey',
        beforeSubmit: function() {
            var n_name = document.getElementById("n_name").value;
            var n_rank = document.getElementById("n_rank").value;
            var n_role = document.getElementById("n_role").value;
            var n_company = document.getElementById("n_company").value;
            var c_product = $('.filled-in:checked').val();
            var n_country = document.getElementById("n_country").value;
            if (!n_name) {
                alert('Make Sure Your First Name and Surname (Optional) Is Not Null');
                document.getElementById("n_name").focus();
                exit();
            }
            if (!n_rank) {
                alert('Make Sure Your Rank Is Not Null');
                document.getElementById("n_rank").focus();
                exit();
            }
            if (!n_role) {
                alert('Make Sure Your Role/Responsibility in your organization Is Not Null');
                document.getElementById("n_role").focus();
                exit();
            }
            if (!n_company) {
                alert('Make Sure Your Institution/Company Is Not Null');
                document.getElementById("n_company").focus();
                exit();
            }
            if (!c_product) {
                alert('Make Sure Choose Product One Of Products');
                document.getElementsByName("c_product").focus();
                exit();
            }
            if (!n_country) {
                alert('Make Sure Your Country Is Not Null');
                document.getElementById("n_country").focus();
                exit();
            }
        },
        success: function() {
            //TinyMCE
            tinymce.init({
                selector: "textarea",
                theme: "modern",
                height: 10,
                width: 1200,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = 'tinymce';
            document.getElementById('part_0').style.display = "block";
            document.getElementById('btnNext_0').style.display = "block";
            document.getElementById('partcat_0').style.display = "block";
        },
        type: 'post',
        resetForm: false
    };
    function prosesSimpan() {
        tinyMCE.triggerSave();
        jQuery("#frm_survey").ajaxSubmit(simpan_opt);
    }
    var simpan_opt = {
        target: '#hasil',
        url: '/surveymodule/survey/simpansurvey',
        beforeSubmit: function() {
            var n_name = document.getElementById("n_name").value;
            var n_rank = document.getElementById("n_rank").value;
            var n_role = document.getElementById("n_role").value;
            var n_company = document.getElementById("n_company").value;
            var c_product = $('.filled-in:checked').val();
            var n_country = document.getElementById("n_country").value;
            var jml = document.getElementById("jmldata").value;
            if (!n_name) {
                alert('Make Sure Your First Name and Surname (Optional) Is Not Null');
                document.getElementById("n_name").focus();
                exit();
            }
            if (!n_rank) {
                alert('Make Sure Your Rank Is Not Null');
                document.getElementById("n_rank").focus();
                exit();
            }
            if (!n_role) {
                alert('Make Sure Your Role/Responsibility in your organization Is Not Null');
                document.getElementById("n_role").focus();
                exit();
            }
            if (!n_company) {
                alert('Make Sure Your Institution/Company Is Not Null');
                document.getElementById("n_company").focus();
                exit();
            }
            // if (!c_product) {
            //     alert('Make Sure Choose Product One Of Products');
            //     document.getElementsByName("c_product").focus();
            //     exit();
            // }
            if (!n_country) {
                alert('Make Sure Your Country Is Not Null');
                document.getElementById("n_country").focus();
                exit();
            }
            for (var x = 0; x < jml * 1; x++) {
                var a = document.getElementsByName('respon_' + x);
                var ischecked_method = false;
                for (var i = 0; i < a.length; i++) {
                    if (a[i].checked) {
                        ischecked_method = true;
                        break;
                    }
                }
                if (!ischecked_method) {
                    alert('Make Sure, Survey Is Not Completed!');
                    a[i].focus();
                    exit();
                }
            }
        },
        success: function() {
            location.reload(true);
            window.location.href = '/';
        },
        type: 'post',
        resetForm: false
    };
    function exporttodoc() {
        var url = 'surveymodule/survey/download';	
        windowOpens(url);
    }
    function windowOpens(url) {
        var w = 0;
        var h = 0;
        w = screen.availWidth;
        h = screen.availHeight;
        var popW = 800, popH = 500;
        var leftc = (w - popW) / 2;
        var topc = (h - popH) / 2;
        var selectWindow = window.open(url, 'Selection', 'left=' + leftc + ',top=' + topc + ', width=' + popW + ',height=' + popH + ',resizable=0,scrollbars=yes')
    }
</script><body class="theme-red">
    <!-- Page Loader
    <div class="page-loader-wrapper" style="display:block">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <!-- <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div> -->
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="header">
                <a href="#"><img src="frontend\assets\statisfaction\images\logo_cs.png"></a>
        </div>
    </nav>
    <section class="content">
		<!-- CPU Usage -->
	<div id="tableview">
		<div class="row clearfix">			
			<div class="col-xs-6 col-md-8">
				<div class="card">
					<img src="frontend\assets\statisfaction\images\utama.png" width="100%"/>                           
				</div> 
			</div>
		
			<div class="col-xs-6 col-md-4">
				<div class="box">			
					<form class="data" action="#" name="frm_identity" id="frm_identity" method="post">
					<div>
						<h2 class="line">Basic Information</h2>
					</div>
					<div class="input-group">
						<label>First Name and Surname (Optional)</label>					
						<div class="form-line">
							<input required="" class="form-control" placeholder="First name" type="text" id="n_name" name="n_name">
						</div>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Rank : </span>
						<div class="form-line">
							<input required="" class="form-control" placeholder="Rank" type="text" id="n_rank" name="n_rank">
						</div>
					</div>
					<div class="input-group">
						<label>Role/Responsibility in your organization : </label>
						<div class="form-line">
							<input required="" class="form-control" placeholder="Role/Responsibility in your organization " type="text" id="n_role" name="n_role">
						</div>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Institution/Company : </span>
						<div class="form-line">
							<input required="" class="form-control" placeholder="Institution/Company" type="text" id="n_company" name="n_company">
						</div>
					</div>
					<div class="input-group">
												<span class="input-group-addon">Product : </span>
						<table>
						  <tr>
							<td>								<input id="c_product_0" name="c_product[]" class="filled-in chk-col-teal" type="checkbox" value="1">
								<label for="c_product_0">CN235</label>
																<input id="c_product_1" name="c_product[]" class="filled-in chk-col-teal" type="checkbox" value="2">
								<label for="c_product_1">C295</label>
																<input id="c_product_2" name="c_product[]" class="filled-in chk-col-teal" type="checkbox" value="3">
								<label for="c_product_2">NC212</label>
																<input id="c_product_3" name="c_product[]" class="filled-in chk-col-teal" type="checkbox" value="4">
								<label for="c_product_3">BELL412</label>
																<input id="c_product_4" name="c_product[]" class="filled-in chk-col-teal" type="checkbox" value="5">
								<label for="c_product_4">NBO105</label>
																<input id="c_product_5" name="c_product[]" class="filled-in chk-col-teal" type="checkbox" value="6">
								<label for="c_product_5">AS365</label>
																<input id="c_product_6" name="c_product[]" class="filled-in chk-col-teal" type="checkbox" value="7">
								<label for="c_product_6">AS350</label>
																<input id="c_product_7" name="c_product[]" class="filled-in chk-col-teal" type="checkbox" value="99">
								<label for="c_product_7">Other</label>
															</td>						
						  </tr>					  
						</table>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Country : </span>
						<div class="form-line">
							<input required="" class="form-control" placeholder="Country" type="text" id="n_country" name="n_country">
						</div>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Date : </span>
						<div class="demo-masked-input">
							<div class="form-line">
								<input required="" class="form-control date" placeholder="Ex: 30/07/2016" type="text" name="d_date" id="d_date">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<a href="#" onClick="exporttodoc();" type="button" class="btn btn-success" >Download Questionnaire  </a>
						</div>
						<div class="col-xs-6">
							<a href="#" onclick="prosesNext1()" style="float:right" type="button" class="btn btn-primary" >Entry Questionnaire  </a>
						</div>
					 </div>
					</form>
				</div>
			</div>
            <!-- #END# CPU Usage -->
        </div>
	</div>
    </section>
</body>
</html>