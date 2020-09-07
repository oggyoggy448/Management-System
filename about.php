<?php require('header.php') ?>

<!-- about us section -->
<div class="container-fluid bg-light">
    <div class="row py-3">
        <div class="col-md-6 text-center d-flex flex-column align-items-center align-self-center">
            <div class="display-2 animate__animated animate__slideInLeft">
                About Us
            </div>
            <div class="animate__animated animate__zoomInUp">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet ab, debitis deserunt at inventore ad
                recusandae, quo quod exercitationem maiores provident unde ex dignissimos illum, soluta qui enim
                repellat nemo.
            </div>

        </div>
        <div class="col-md-6">
            <img src="img/girl.jpg" alt="girl"
                class="img-fluid rounded-circle animate__animated animate__bounceInRight">
        </div>
    </div>
</div>


<!-- detail section  -->
<div class="accordion py-3" id="about_accor">
    <div data-aos="zoom-in" class="display-3 text-center"> Further detail </div>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link text-dark btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#why_us" aria-expanded="true" aria-controls="why_us">
                    Why Us?
                </button>
            </h2>
        </div>

        <div id="why_us" class="collapse show" aria-labelledby="headingOne" data-parent="#about_accor">
            <div class="card-body">
                <div class="display-3 text-uppercase">
                    why us?
                </div>
                <div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, consequuntur totam? Maxime
                    exercitationem harum dicta inventore quam ratione, ad aliquid expedita, repellat rem eveniet
                    pariatur cum perferendis fugit voluptatum! Reiciendis?Excepturi quam laudantium tenetur perferendis
                    adipisci voluptatibus earum obcaecati fuga quidem aut. Amet sed tempore dolorem eos neque quae
                    error, ad quo praesentium dolorum provident placeat. Maxime praesentium illo accusantium?
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="rank">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-info text-left collapsed" type="button"
                    data-toggle="collapse" data-target="#rank" aria-expanded="false" aria-controls="rank">
                    Our Level?
                </button>
            </h2>
        </div>
        <div id="rank" class="collapse" aria-labelledby="rank" data-parent="#about_accor">
            <div class="card-body">
                <div class="text-uppercase display-3">
                    our rank
                </div>
                <div>
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                    wolf
                    moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                    eiusmod.
                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                    ea
                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
                    denim
                    aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="students">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#no_students" aria-expanded="false" aria-controls="no_students">
                    Number of Students
                </button>
            </h2>
        </div>
        <div id="no_students" class="collapse" aria-labelledby="students" data-parent="#about_accor">
            <div class="card-body">
                <div class="text-uppercase display-4 ">
                    Number of students in our school?
                </div>
                <div>
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                    wolf
                    moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                    eiusmod.
                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                    ea
                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
                    denim
                    aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>
</div>


<?php require("footer.php") ?>
<script>
    $('.home').removeClass("active");
    $(".about").addClass("active");
</script>