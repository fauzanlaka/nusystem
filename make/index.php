<html>
    <body>

        <!-- Wrapper div -->
        <div id="wrapper>


            <!-- Header div -->
            <div id="header">
                <?php
                    include('header.php'); // File containing header code
                ?>
            </div>

            <!-- Content div -->
            <div id="content">


                <!-- Left Colon div -->
                <div id="leftCol">
                    <?php
                        include('leftMenu.php'); // File containing the menu
                    ?>
                </div>


                <!-- Center colon -->
                <div id="centerCol">
                    <?php
                        $page = $_GET['page']; // To get the page

                        if($page == null) {
                            $page = 'index'; // Set page to index, if not set
                        }
                        switch ($page) {

                            case 'index':
                                include('frontPage.php');
                                break;

                            case 'about':
                                include('about.php');
                                break;

                            case 'contact':
                                include('contact.php');
                                break;
                        }

                    ?>
                </div>

            </div>

            <!-- Footer div -->
            <div id="footer">
                <?php
                    include('footer.php'); // File containing the footer
                ?>
            </div>
        </div>
    </body> 
</html>