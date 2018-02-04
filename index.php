<?php require 'header.php'; ?>
    <!-- section start -->
    <!-- ================ -->
    <section class="pv-30 light-gray-bg clearfix">
        <div class="container">
            <h2 class="title logo-font text-center text-muted">Breadway</h2>
            <div class="separator"></div>
            <p class="text-center lead">Вистински мирис и вкус</p>
            <br>
            <div class="row grid-space-10">
                <div class="col-md-6 col-md-push-6">
                    <img class="img-thumbnail" src="images/slika.jpg" alt="slika">
                </div>
                <div class="col-md-6 col-md-pull-6">
                    <div class="space-top visible-lg"></div>
                    <h3 class="logo-font title text-muted"><span class="text-default">Breadway</span></h3>
                    <div class="separator-2"></div>
                    <p class=" text-muted lead naslov">Во брзото темпо на модерниот живот,<br> постојат драгоцени
                        моменти кога времето ке успори, <br>посветени на мали секојдневи збиднувања,<br> баш како што е
                        мирисот и вкусот на свежо ипечениот леб во Breadway</p>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section start -->
    <!-- ================ -->
    <section id="dishes" class="section default-bg clearfix"></section>
    <!-- section end -->
    <!-- section start -->
    <!-- ================ -->
    <section class="section clearfix">
        <div class="container">
            <h2 class="logo-font text-center text-muted">Breadway</h2>
            <div class="separator"></div>
            <h3 class="lead text-center naslov">Дел од нашиот асортиман кој топло ви го препорачуваме за денеска</h3>
            <!-- Nav tabs -->
            <div class="text-center">
                <ul class="nav nav-pills" role="tablist">
                    <li class="active"><a href="#pill-1" role="tab" data-toggle="tab" title="images">Солено</a></li>
                    <li><a href="#pill-2" role="tab" data-toggle="tab" title="video">Благо</a></li>
                    <li><a href="#pill-3" role="tab" data-toggle="tab" title="text">Кафе</a></li>
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content clear-style">
                <div class="tab-pane active" id="pill-1">
                    <div class="row">
                        <?php

                        $type = "Солено";

                        $results = mysqli_query($con, "SELECT * FROM tekst WHERE type = '$type' ORDER BY id DESC LIMIT 4");
                    
                        while ($row = mysqli_fetch_array($results)) {
                         
                            $id = $row['id'];
                            $description = $row['rte'];
                            $title = $row['name'];
                            $image = $row['slika'];
                            $kategorija = $row['type'];
                            echo '<div class="col-md-3">';
                            echo '<div class="image-box text-center style-2 mb-20">';
                            if (!($image = $row['slika'])) {
                            } else {
                                echo ' <img src="http://dev.breadway.mk/' . $image . '" width="200" height="200" alt="' . $title . '" class="img-circle img-thumbnail">';
                            }
                            echo '<div class="body padding-horizontal-clear">';
                            echo '<h4 class="logo-font title">' . $title . '</h4>';
                            if (!($description = $row['rte'])) {
                            } else {
                                echo '<p class="small mb-10">' . $description . '</p>';
                            }
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-pane" id="pill-2">
                    <div class="row">
                        <div class="row">
                            <?php
                            $results1 = mysqli_query($con, "SELECT * FROM tekst WHERE type = 'Благо' ORDER BY id DESC LIMIT 4");
                            while ($row1 = mysqli_fetch_array($results1)) {
                                $id1 = $row1['id'];
                                $description1 = $row1['rte'];
                                $title1 = $row1['name'];
                                $image1 = $row1['slika'];
                                $kategorija1 = $row1['type'];
                                echo '<div class="col-md-3">';
                                echo '<div class="image-box text-center style-2 mb-20">';
                                if (!($image1 = $row1['slika'])) {
                                } else {
                                    echo ' <img src="http://dev.breadway.mk/' . $image1 . '" width="200" height="200" alt="' . $title1 . '" class="img-circle img-thumbnail">';
                                }
                                echo '<div class="body padding-horizontal-clear">';
                                echo '<h4 class="logo-font title">' . $title1 . '</h4>';
                                if (!($description1 = $row1['rte'])) {
                                } else {
                                    echo '<p class="small mb-10">' . $description1 . '</p>';
                                }
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="pill-3">
                    <div class="row">
                        <?php
                        $results2 = mysqli_query($con, "SELECT * FROM tekst WHERE type = 'Кафе' ORDER BY id DESC LIMIT 4");
                        while ($row2 = mysqli_fetch_array($results2)) {
                            $id2 = $row2['id'];
                            $description2 = $row2['rte'];
                            $title2 = $row2['name'];
                            $image2 = $row2['slika'];
                            $kategorija2 = $row2['type'];
                            echo '<div class="col-md-3">';
                            echo '<div class="image-box text-center style-2 mb-20">';
                            if (!($image2 = $row2['slika'])) {
                            } else {
                                echo ' <img src="http://dev.breadway.mk/' . $image2 . '" width="200" height="200" alt="' . $title2 . '" class="img-circle img-thumbnail">';
                            }
                            echo '<div class="body padding-horizontal-clear">';
                            echo '<h4 class="logo-font title">' . $title2 . '</h4>';
                            if (!($description2 = $row2['rte'])) {
                            } else {
                                echo '<p class="small mb-10">' . $description2 . '</p>';
                            }
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- pills end -->
        </div>
    </section>
    <!-- section end -->
    <!-- section start -->
    <!-- ================ -->
    <section id="meni" class="section default-bg clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center logo-font title naslov">Мени</h2>
                    <h3 class="text-center naslov">Ова се само дел од нашиот асортимани за повеќе посететене</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section start -->
    <!-- ================ -->
    <section class="pv-40 dark-translucent-bg parallax" style="background-image:url(images/logo.jpg);">
        <div class="owl-carousel content-slider-with-controls-autoplay-hover-stop buttons-hide">
            <div class="container">
                <h3 class="logo-font text-center">Солено</h3>
                <div class="separator"></div>
                <div class="row">
                    <?php
                        $results3 = mysqli_query($con, "SELECT * FROM meni WHERE type = 'Солено' ORDER BY id DESC LIMIT 12");

                    while ($row3 = mysqli_fetch_array($results3)) {
                        $id3 = $row3['id'];
                        $description3 = $row3['rte'];
                        $title3 = $row3['name'];
                        $image3 = $row3['slika'];
                        $kategorija3 = $row3['type'];
                        $cena3 = $row3['cena'];
                        echo '<div class="col-md-4">';
                        echo '<ul class="list">';
                        echo '<li class="clearfix">';
                        echo '<h4 class="title logo-font">' . $title3 . '</h4>';
                        if (!($description3 = $row3['rte'])) {
                        } else {
                            echo '<p class="small">' . $description3 . '</p>';
                        }
                        echo '</li>';
                        echo '</ul>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="space-bottom"></div>
            </div>
            <div class="container">
                <h3 class="logo-font text-center">Благо</h3>
                <div class="separator"></div>
                <div class="row">
                    <?php
                    $results4 = mysqli_query($con, "SELECT * FROM meni WHERE type = 'Благо' ORDER BY DESC LIMIT 12");
                    while ($row4 = mysqli_fetch_array($results4)) {
                        $id4 = $row4['id'];
                        $description4 = $row4['rte'];
                        $title4 = $row4['name'];
                        $image4 = $row4['slika'];
                        $kategorija4 = $row4['type'];
                        $cena4 = $row4['cena'];
                        echo '<div class="col-md-4">';
                        echo '<ul class="list">';
                        echo '<li class="clearfix">';
                        echo '<h4 class="title logo-font">' . $title4 . '</h4>';
                        if (!($description4 = $row4['rte'])) {
                        } else {
                            echo '<p class="small">' . $description4 . '</p>';
                        }
                        echo '</li>';
                        echo '</ul>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="space-bottom"></div>
            </div>
            <div class="container">
                <h3 class="logo-font text-center">Кафе</h3>
                <div class="separator"></div>
                <div class="row">
                    <?php
                    $results5 = mysqli_query($con, "SELECT * FROM meni WHERE type='Кафе' ORDER BY id DESC LIMIT 12");
                    while ($row5 = mysqli_fetch_array($results5)) {
                        $id5 = $row5['id'];
                        $description5 = $row5['rte'];
                        $title5 = $row5['name'];
                        $image5 = $row5['slika'];
                        $kategorija5 = $row5['type'];
                        $cena5 = $row5['cena'];
                        echo '<div class="col-md-4">';
                        echo '<ul class="list">';
                        echo '<li class="clearfix">';
                        echo '<h4 class="title logo-font">' . $title5 . '</h4>';
                        if (!($description5 = $row5['rte'])) {
                        } else {
                            echo '<p class="small">' . $description5 . '</p>';
                        }
                        echo '</li>';
                        echo '</ul>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="space-bottom"></div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section start -->
    <!-- ================ -->
    <section class="section light-gray-bg clearfix">
        <div class="container">
            <h2 class="logo-font text-center text-muted">Reviews</h2>
            <div class="separator"></div>
            <div class="fb-comments" data-href="https://www.facebook.com/breadwayskopje/?fref=ts" data-width="100%"
                 data-numposts="5"></div>
        </div>
       </section>
    <!-- section end -->
<?php require 'footer.php'; ?>