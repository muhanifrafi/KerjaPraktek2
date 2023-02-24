
<script language="javascript">
    $(document).ready(function () {

        // process the form
        $('#contactform').submit(function (event) {
            var file = $('input[name=file]').val();
            var fileName = $('input[name=file]').val();
            var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1).toLowerCase();
            //alert(" ==> "+fileName+" --> "+fileExtension);

            $('.label_side').removeClass('has-error'); // remove the error class
            $('.validate').remove(); // remove the error text



            var image = $('#file')[0].files[0];


            var m_data = new FormData();
            m_data.append('company', $('input[name=company]').val());
            m_data.append('fullname', $('input[name=fullname]').val());
            m_data.append('phone', $('input[name=phone]').val());
            m_data.append('email', $('input[name=email]').val());
            m_data.append('refcode', $('#refcode').val());
            m_data.append('subcategory', $("#subcategory").val() || []);
            m_data.append('msg', $('textarea[name=msg]').val());
            m_data.append('code', $('input[name=code]').val());
            m_data.append('idcustomer', $('input[name=idcustomer]').val());
            m_data.append('subject', $('input[name=subject]').val());
            m_data.append('file', image);


            $.ajax({
                    type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url: 'exec-contact.php', // the url where we want to POST
                    data: m_data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    dataType: 'json',
                    encode: true
                })

                // using the done promise callback
                .done(function (data) {

                    // log data to the console so we can see
                    console.log(data);

                    // here we will handle errors and validation messages
                    if (!data.success) {

                        // handle errors for fullname ---------------
                        if (data.errors.email) {
                            $('#femail').addClass(
                            'has-error'); // add the error class to show red input
                            $('#femail').append('<div class="validate" style="display:block">' +
                                data.errors.email + '</div>'
                                ); // add the actual error message under our input
                        }
                        if (data.errors.company) {
                            $('#fcompany').addClass(
                            'has-error'); // add the error class to show red input
                            $('#fcompany').append('<div class="validate" style="display:block">' +
                                data.errors.company + '</div>'
                                ); // add the actual error message under our input
                        }
                        if (data.errors.fullname) {
                            $('#ffullname').addClass(
                            'has-error'); // add the error class to show red input
                            $('#ffullname').append('<div class="validate" style="display:block">' +
                                data.errors.fullname + '</div>'
                                ); // add the actual error message under our input
                        }
                        if (data.errors.subject) {
                            $('#fsubject').addClass(
                            'has-error'); // add the error class to show red input
                            $('#fsubject').append('<div class="validate" style="display:block">' +
                                data.errors.subject + '</div>'
                                ); // add the actual error message under our input
                        }
                        if (data.errors.phone) {
                            $('#fphone').addClass(
                            'has-error'); // add the error class to show red input
                            $('#fphone').append('<div class="validate" style="display:block">' +
                                data.errors.phone + '</div>'
                                ); // add the actual error message under our input
                        }
                        if (data.errors.subcategory) {
                            $('#fsubcategory').addClass(
                            'has-error'); // add the error class to show red input
                            $('#fsubcategory').append(
                                '<div class="validate" style="display:block">' + data.errors
                                .subcategory + '</div>'
                                ); // add the actual error message under our input
                        }
                        if (data.errors.refcode) {
                            $('#frefcode').addClass(
                            'has-error'); // add the error class to show red input
                            $('#frefcode').append('<div class="validate" style="display:block">' +
                                data.errors.refcode + '</div>'
                                ); // add the actual error message under our input
                        }
                        if (data.errors.file) {
                            $('#ffile').addClass(
                            'has-error'); // add the error class to show red input
                            $('#ffile').append('<div class="validate" style="display:block">' + data
                                .errors.file + '</div>'
                                ); // add the actual error message under our input
                        }
                        if (data.errors.msg) {
                            $('#fmsg').addClass(
                            'has-error'); // add the error class to show red input
                            $('#fmsg').append('<div class="validate" style="display:block">' + data
                                .errors.msg + '</div>'
                                ); // add the actual error message under our input
                        }
                        if (data.errors.code) {
                            $('#fcode').addClass(
                            'has-error'); // add the error class to show red input
                            $('#fcode').append('<div class="validate" style="display:block">' + data
                                .errors.code + '</div>'
                                ); // add the actual error message under our input
                        }

                        //alert(data);


                    } else {

                        //alert("sukses");
                        $('#result').fadeIn('slow');
                        $('#result').html(data.message);
                        $("#result").delay(3000).fadeOut();
                        $('input[name=title]').val("");
                        //tinyMCE.activeEditor.setContent('');
                        $('input[name=fullname]').val("");
                        $('input[name=subject]').val("");
                        $('input[name=company]').val("");
                        $('input[name=phone]').val("");
                        $('input[name=email]').val("");
                        $('input[name=refcode]').val("");
                        $('input[name=file]').val("");
                        $('input[name=subcategory]').val("");
                        $('input[name=code]').val("");
                        $('textarea[name=msg]').val("");
                        $('input:checkbox').removeAttr('checked');
                        $('.multiselect-selected-text').html('Non selected');
                        $('#msgreset').append(
                            '<div class="alert alert-success"><i class="fa fa-check"></i>' +
                            data.message + '</div>');
                        $("#msgreset").delay(10000).fadeOut();

                        // ALL GOOD! just show the success message!
                        //$('form').append('<div class="alert alert-success">' + data.message + '</div>');

                        // usually after form submission, you'll want to redirect
                        // window.location = '/thank-you'; // redirect a user to another page

                    }
                })

                // using the fail promise callback
                .fail(function (data) {

                    // show any errors
                    // best to remove for production
                    console.log(data);
                });

            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
        });

        var min_chars = 3;

        //result texts  
        var checking_html = 'Checking...';

        //when input changed  
        $('#email').change(function () {
            //run the character number check  
            var email = $('#email').val();
            //use ajax to run the check  

            $('#femail').removeClass('has-error'); // add the error class to show red input
            $('.validate').remove(); // add the actual error message under our input
            if (validateEmail(email)) {
                $("#submit").attr("disabled", false);

            } else {
                $('#femail').addClass('has-error'); // add the error class to show red input
                $('#femail').append('<div class="validate" style="display:block">Email :' + email +
                    ' is not valid</div>'); // add the actual error message under our input
                $("#submit").attr("disabled", true);
                $('#email').focus();
                return false;
            }
        });


    });

    function validateEmail(email) {
        var re =
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

</script>
<!-- ======= Footer ======= -->
<footer id="footer" class="section-bg">
    <div class="footer-top">
        <div class="container">

            <div class="row">
                <div class="col-md-12" style="padding:10px 30px;">
                    <div id="result" class="alert alert-success" style="display:none"></div>
                </div>

                <div class="col-lg-6">
                    <div class="form">

                        <h4>Send us a message</h4>

                        <form method="post" role="form" class="php-email-form" id="contactform" name="contactform"
                            enctype="multipart/form-data">
                            <?php
if (isset($_SESSION['userid'])) {
	$idcustcontact=isset($_SESSION["acontact"]) ? $_SESSION["acontact"] : '';	
	$phone=$_SESSION["phone"];
?>
                            <input type="hidden" name="idcustomer" value="<?php echo $idcustcontact;?>">
                            <input type="hidden" name="company" value="<?php echo  $_SESSION["company"]?>">
                            <input type="hidden" name="fullname" value="">
                            <input type="hidden" name="phone" value="<?php echo $_SESSION["phone"]?>">
                            <input type="hidden" name="email" value="<?php echo $_SESSION["email"]?>">
                            <?php
} else {
	$phone="";
?>
                            <input type="hidden" name="idcustomer" value="">
                            <div class="form-group" id="fcompany">
                                <input type="text" class="form-control width_100" name="company" id="company"
                                    placeholder="Company Name" />

                            </div>
                            <div class="form-group" id="ffullname">
                                <input type="text" class="form-control width_100" name="fullname" id="fullname"
                                    placeholder="Contact Name" data-rule="minlen:4"
                                    data-msg="Please enter at least 8 chars of subject" />

                            </div>
                            <div class="form-group" id="fphone">
                                <input type="text" class="form-control width_100" value="<?php echo $phone;?>"
                                    name="phone" id="phone" placeholder="Phone" data-rule="minlen:4"
                                    data-msg="Please enter at least 12 chars of subject" />

                            </div>
                            <div class="form-group" id="femail">
                                <input type="email" class="form-control width_100" name="email" id="email"
                                    placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />

                            </div>
                            <?php
}
?> <div class="form-group" id="frefcode">
                                <select name="refcode" id="refcode" class="form-control width_100">
                                    <!-- <option disabled selected> --- Please Select Your Choise --- </option> -->
                                    <option value=""> --- Please Select Category --- </option>
                                    @inject('ContactController', 'App\Http\Controllers\ContactController')
                                    @foreach($ContactController->index() as $contact)
                                    <option value="{{$contact->c_code}}">
                                            {{$contact->n_code}}</option>
                                    @endforeach
                                    <select>
                            </div>
                            <div class="form-group" id="fsubcategory">
                                <select name="subcategory" id="subcategory" class="form-control width_100">
                                    <!--<select name="category"  multiple="multiple" class="form-control width_100" id="category" data-rule="minlen:4" data-msg="You can select one or more category " >-->
                                </select>


                            </div>

                            <div class="form-group" id="fsubject">
                                <input type="text" class="form-control width_100" name="subject" id="subject"
                                    placeholder="Subject" data-rule="minlen:4"
                                    data-msg="Please enter at least 4 chars" />

                            </div>
                            <div class="form-group" id="fmsg">
                                <textarea class="form-control width_100" name="msg" rows="5" data-rule="required"
                                    data-msg="Please write something for us" placeholder="Message"></textarea>

                            </div>

                            <div class="form-group" id="ffile">
                                <input type="file" style='background: #fff;' id="file" name="file" accept=".pdf"
                                    name="image" data-rule="required"> *pdf only
                            </div>


                            <div class="form-group" id="fcode">
                                <?php
      // show captcha HTML using Securimage::getCaptchaHtml()
      require_once 'backend/securimage/securimage.php';
      $options = array();
      $options['input_name']             = 'code'; // change name of input element for form post
      $options['disable_flash_fallback'] = false; // allow flash fallback

      if (!empty($_SESSION['ctform']['captcha_error'])) {
        // error html to show in captcha output
        $options['error_html'] = $_SESSION['ctform']['captcha_error'];
      }

      echo "<div id='captcha_container_1'>\n";
      echo Securimage::getCaptchaHtml($options);
      echo "\n</div>\n";
?>
                            </div>
                            <div id="msgreset"></div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-left"><button type="reset" class="btn btn-warning"
                                    title="Reset">Reset</button> <button id="submit" type="submit" class="btn btn-info"
                                    title="Send Message">Send Message</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-links">
                        <h4>CORPORATE OFFICE</h4>
                        <strong>PT DIRGANTARA INDONESIA</strong>
                        <p>
                            Jl. Pajajaran no. 154 <br>
                            Bandung 40174 <br>
                            Indonesia <br><br>
                            <h4>CRM</h4>
                            <strong>Phone : </strong>+62 813 2251 3133<br>
                            <strong>Phone : </strong>+62 838 3196 4064<br>
                            <strong>Email : </strong> crm_ptdi@indonesian-aerospace.com<br>
                        </p>
                    </div>
                    <!--div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div-->
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#refcode").change(function () {
            var Refcode = $(this).val();
            //alert("OK");
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "backend/getRefcode.php",
                data: "Refcode=" + Refcode,
                success: function (msg) {
                    if (msg == '') {
                        $("select#subcategory").html('');
                    } else {
                        $("select#subcategory").html(msg);
                    }
                }
            });
        });

    </script>
