<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>Help</title>
    <meta charset="utf-8">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <?php echo $style;?>
	
    <!--[if lt IE 9]>
        <script src="<?php echo base_url();?>assets/js/vendor/html5shiv.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/vendor/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php echo $header;?>

<section id="content" class="light_section">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="section_header">Help</h2>
                <!--<p>Customer is always number one for Caketoon. Don't hesistate to contact us if you have any inquiries.</p>-->
            </div>
        </div>

        <div class="row">
            <ul>
            
            <li>
            <h5><b>What is Job Carrier ?</b></h5>
            Job Carrier is a web based recommendation system. This system recommend the jobs that has highest point base on the criterias calculation.
            </li>
			</br>
			
			<li>
            <h5><b>Where is the data in this system taken from ?</b></h5>
            The Datas in this system is taken from Glassdoor API, so the jobs in this is system is the jobs that published in Glassdoor.
            </li>
			</br>
			
			<li>
            <h5><b>Why i have to give my opinion about how many % the job factor's importance when i registered?</b></h5>
            You have to give your opinion so the application can give you job recommendation based on your preference
            </li>
			</br>
            
			<li>
            <h5><b>How i can search my suitable job ?</b></h5>
            You can search it by choosing the category and location and this web will show you the jobs based on your input.
            </li>
			</br>
			
			<li>
            <h5><b>What is culture and values in a job ?</b></h5>
            Company culture is the personality of a company. It defines the environment in which employees work. Company culture includes a variety of elements, including work environment, company mission, value, ethics, expectations, and goals. For example, some companies have a team-based culture with employee participation on all levels, while other have a more traditional and formal management style.
            </li>
			</br>
			
			<li>
            <h5><b>What is Senior Leadership in a job ?</b></h5>
            Senior leadership is how you can get a lead by your senior. Leader and trust that emerges out of expertise first, not position. Senior’s support for and active engagement in planning how vision, policies, and practices are put into effect;
			</li>
			</br>
			
			<li>
            <h5><b>What is Compensation and Benefit in a job ?</b></h5>
            Compensation and benefit is what you can get from your job. It includes your salary, your facility , your benefit, and your reward that you get from the company. The right compensation and benefits schemes ensure that hard-working employees are rewarded fairly and in the most cost-effective way for the company. This in turn then motivates employees to sustain their performance.
			</li>
			</br>
			
			<li>
            <h5><b>What is Carrier Opportunities in a job ?</b></h5>
            Carrier opportunity is the prospect of the future that we have. It's important to recognize opportunities when they present themselves. It should have realized the long-term career potential of the new job was far more important than the short-term satisfaction realized by staying in old job.
			</li>
			</br>
			
			<li>
            <h5><b>What is Work Life Balance in a job ?</b></h5>
            Work Life balance is the balance of your private life and your job life. Does the opportunity provide more time to yourself, or does it take you further from family and friends?  Does it offer the mix of work and after-work life balance that you are seeking?  Many people think of work as a means to an end.  They work because it allows them to better enjoy after-work life. They have successful careers and balanced lives; it is possible.
			</li>
			</br>
			
			<li>
            <h5><b>What is Recommend mean ?</b></h5>
            Recommend show the percentage of the people that recommend the job.
			</li>
			</br>
			
			
			<li>
            <h5><b>Can i leave a comment in the job page ?</b></h5>
            Of course you can, but you have to login first, otherwise you can't leave a comment or bookmark a job.
            </li>
			</br>
			
			<li>
            <h5><b>What is bookmark ?</b></h5>
            You can bookmark jobs that you want. In the bookmark page, you will get the list of the jobs that you like.
            </li>
			</br>
			
			<li>
            <h5><b>I don't have an account yet, what i have to do ?</b></h5>
            You can register by entering the required data.
            </li>
			</br>
			
			<li>
            <h5><b>I have questions that isn't answered above , what i have to do ?</b></h5>
            you can contact us using the form in Contact Us page. We aim to reply to all queries as soon as possible.
            </li>
			</br>
           
        </ul>            

            
        </div>
    </div>
</section>


    

	<?php echo $footer; echo $script;?>

    </body>
</html>