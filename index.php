<?php
require('common/connection.inc.php');
require('common/top.inc.php');
include('admin/configue_contact.php');
$karaya_contact = new Contact();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['name']) && !empty($_POST['email']) && 
    !empty($_POST['subject']) && !empty($_POST['message']))
{
    $karaya_contact->name = $_POST['name'];
    $karaya_contact->email = $_POST['email'];
    $karaya_contact->subject = $_POST['subject'];
    $karaya_contact->message = $_POST['message'];
    if($karaya_contact->addRecord()){
        header('location: index.php?msg=success');
    }
    else{
        header('location: index.php?msg=fail');
    }
}
else{
}
    echo " Please fill all details";

}

$query = "select * from categories where status='1' LIMIT 4";
$row = query_list($query, $con);
if($row == FALSE){
    $count = 0;
}
else{
    $count = count($row);
}

?>
    <style>
        .html {
            scroll-behavior: smooth;
        }
        
        .bg-custom {
            background-color: #000000de;
        }
        
        @media only screen and (max-width: 600px) {
            /* css for mobile here */
        }
        
        .scrollmenu {
            overflow-x: scroll;
            white-space: nowrap;
        }
        
        .scrollmenu::-webkit-scrollbar {
            display: none;
        }
        
        div.scrollmenu img {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px;
            text-decoration: none;
        }
        /* The Modal (background) */
        
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }
        /* The Modal (background) */
        
        .modal2 {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }
        /* Modal Content */
        
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        /* Modal Content */
        
        .modal-content2 {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        /* The Close Button */
        
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        /* The Close Button */
        
        .close2 {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        
        .close2:hover,
        .close2:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-touch="true">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="./images/s1.jpg" style="width: 100%;height: 70%;" alt="First slide">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>
                        <span style="color: #fff;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi qui labore perferendis, voluptatum exercitationem perspiciatis quibusdam, porro saepe, cum error aperiam velit. Excepturi pariatur recusandae sequi nemo iste ab laboriosam?
                        </span>
                    </h5>
                    <p>
                        <span style="color: #fff;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi qui labore perferendis, voluptatum exercitationem perspiciatis quibusdam, porro saepe, cum error aperiam velit. Excepturi pariatur recusandae sequi nemo iste ab laboriosam?
                            </span>
                    </p>
                </div> -->
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/s2.jpg" style="width: 100%;height: 70%;" alt="First slide">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, animi? Magni, quas. Ut, debitis enim. Ab esse minima natus, voluptatem, dolor, sapiente in doloribus fugit laborum quod asperiores inventore perspiciatis.
                    </h5>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi voluptas delectus et incidunt molestiae suscipit aspernatur quod nulla nesciunt earum vero, eos accusamus commodi maxime sunt. Tempore ipsa dicta deleniti?
                    </p>
                </div> -->
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/s3.jpg" style="width: 100%;height: 70%;" alt="Third slide">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, animi? Magni, quas. Ut, debitis enim. Ab esse minima natus, voluptatem, dolor, sapiente in doloribus fugit laborum quod asperiores inventore perspiciatis.
                    </h5>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi voluptas delectus et incidunt molestiae suscipit aspernatur quod nulla nesciunt earum vero, eos accusamus commodi maxime sunt. Tempore ipsa dicta deleniti?
                    </p>
                </div> -->
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <div id="about"></div>

    <section class="ftco-no-pb ftco-no-pt bg-light" style="margin-top: 35px;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/welcome.jpg);">
                    <!-- <a href="#" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="icon-play"></span>
                    </a> -->
                </div>
                <div class="col-md-7 py-md-5 wrap-about pb-md-5 ftco-animate">
                    <div class="heading-section-bold mb-4 mt-md-5">
                        <div class="ml-md-0">
                            <p style="font-size: xx-large;color: black;">
                                Welcome to <span style="font-weight: bold;">
                                    SimplyMad
                                </span>
                            </p>
                            <!-- <h2 class="mb-4">
                                Welcome to SimplyMad
                            </h2> -->
                        </div>
                    </div>

                    <div class="pb-md-5 pb-4">
                        <p>But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
                        <p>But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her.</p>
                        <!-- <p><a href="#" class="btn btn-primary">Factory Profile</a></p> -->
                        <div id="myBtn" class="btn btn-outline-dark" style="border-radius: 0px;">
                            Company Profile
                        </div>
                        <!-- <div id="player"></div>
                        <a class="close-reveal-modal">&#215;</a> -->

                        <!-- The Modal -->
                        <div id="myModal" class="modal" style="padding-top: 20%;">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi perferendis quos corporis debitis! Dignissimos accusamus placeat quam dolore obcaecati, necessitatibus sapiente numquam sint fugit aliquid magnam iusto nihil, ullam minus.
                                </p>
                            </div>
                        </div>

                        <div id="myBtn2" class="btn btn-outline-dark" style="border-radius: 0px;">
                            Company Tour
                        </div>

                        <!-- The Modal -->
                        <div id="myModal2" class="modal2">
                            <!-- Modal content -->
                            <div class="modal-content2">
                                <span class="close2">&times;</span>
                                <p>
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                    </iframe>

                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-gallery" style="margin-top: 40px;background-color:rgb(34, 34, 34);;padding-bottom: 40px;">

        <div class="container" style="padding-top: 40px;">

            <div class="row d-flex">
                <div class="col-md-12">
                    <h2 class="mb-4" style="color: #fff;padding-left: 0px;">
                        Categories
                    </h2>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>


        <div class="mb-1 ftco-animate">
            <div class="container">
                <div class="row">
                    <?php
    for($i=0;$i<$count;$i++){
        $img = "/php/web_project_7/admin/images/".$row[$i]['category_image'];
                    ?>
                        <div class="col-sm-4 col-md-4 col-lg-3 ftco-animate">
                            <div class="product">
                                <a href="products.php?id=<?php echo $row[$i]['id']?>" class="img-prod"><img class="img-fluid" src="<?php echo $img; ?>" style="object-fit: cover;width: 100%;height: 200px;">
                                <div class="overlay"></div>
                            </a>
                                <div class="text py-3 px-3">
                                    <h3>
                                        <?php  echo $row[$i]['category_name']; ?>
                                    </h3>
                                    <div class="d-flex">
                                    </div>
                                    <p class="bottom-area d-flex px-3">
                                        <a href="products.php?id=<?php echo $row[$i]['id']?>" class="add-to-cart text-center py-2 mr-1"><span>View Details <i class="ion-ios-add ml-1"></i></span></a>
                                        <!-- <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a> -->
                                    </p>
                                </div>
                            </div>

                        </div>

                        <?php
    }
?>

                </div>
                <div style="margin-bottom: 20px;">
                    <h2 style="float: right;" class="mb-4" style="padding-left: 0px;">

                        <a href="categories.php">
                            <span style="color: #fff;">
                                View All
                            </span>
                        </a>

                    </h2>
                </div>
            </div>
        </div>
    </section>


    <div id="contact"></div>

    <section class="contact-section bg-light">
        <div class="container" style="margin-top: 35px;">
            <div class="row justify-content-center">
                <div class="col-md-8 heading-section text-center mb-4 ftco-animate">
                    <h2 class="mb-4">
                        Contact us
                    </h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="w-100"></div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Address:</span> 152 street, B road Jaipur</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Phone:</span> <a href="tel://1234567920"> 7597690537</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">Contact@simplymad.com</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Website</span> <a href="#">yoursite.com</a></p>
                    </div>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form method="POST" class="bg-white p-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea id="" cols="30" rows="7" class="form-control" name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-outline-dark py-3 px-5" style="border-radius: 0px;">
                        </div>
                    </form>

                </div>

                <div class="col-md-6 d-flex">
                    <div id="map" class="bg-white"></div>
                </div>
            </div>
        </div>
    </section>


    <?php
require('common/footer.inc.php');

?>