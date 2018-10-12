        </div><!--END #main-content-->  
            </div><!--END #content-container-->

                <footer id="site-footer">

                    <!--Instagram Feed-->
                    <?php echo do_shortcode("[instagram-feed carousel=true imagepadding=5]"); ?>     

                    <div class="footer-inner">

                            <div class="container">
                                
                                <!--
                                <div class="sign-up">
                                    <h3>Subscribe</h3>
                                    <p>Enter your email address and we'll send you up to the minute news from AU!</p>
                                    <form id="subscribeenews-ext-2" action="http://athabascau.us8.list-manage.com/subscribe/post?u=207a42d685ea3d9634a758a14&amp;id=3cf7d17bdc" method="post" target="_blank" onsubmit="if ( subbox1.value == 'First Name') { subbox1.value = ''; } if ( subbox2.value == 'Last Name') { subbox2.value = ''; }" name="enews-ext-2">
                                        <label for="subbox" class="sc-only">E-Mail Address</label>
                                        <input value="" id="subbox" placeholder="E-Mail Address" name="EMAIL" required="required" type="email">
                                        <input value="Sign Up" id="subbutton" class="btn btn-orange" type="submit">
                                    </form>
                                </div>-->


                            <div class="social-media">
                                <h3>Connect with AU</h3>
                                <ul>
                                    <li>
                                        <a href="http://www.facebook.com/AthabascaU" target="_blank">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                            <span class="sc-only">Facebook</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/Athabascau" target="_blank">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                            <span class="sc-only">Twitter</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://www.youtube.com/user/AthabascaUniversity" target="_blank">
                                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                            <span class="sc-only">Youtube</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/athabascau/" target="_blank">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                            <span class="sc-only">Instagram</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/company/19365" target="_blank">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            <span class="sc-only">LinkedIn</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>

                <footer id="secondary-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="main-au-site">
                                    <a id="footer-logo" href="http://www.athabascau.ca/" target="_blank">
                                        <div class="shield-logo">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 145"><title>Athabasca University Shield</title><path class="shield" d="M1.3 4v88.3c0 29.3 48.7 49.4 48.7 49.4s48.7-20 48.7-49.4V4H1.3zM81 92.3c0 9.7-16.5 22.5-31 29.9-14.7-7.5-31-20.1-31-29.9V21.7h62v70.6z"></path></svg>
                                        </div>
                                        <p>Visit Main AU Website</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div id="copyright">&copy; <?php echo date('Y'); ?> Athabasca University. All rights reserved. <a href="http://www.athabascau.ca/privacy/">Privacy Policy</a></div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div><!-- END #page -->
            <a href="#0" class="cd-top js-cd-top" aria-label="back to top"></a>
<?php wp_footer(); ?>

</body>
</html>


