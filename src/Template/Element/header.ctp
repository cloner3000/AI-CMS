<!-- Header -->
<header class="header">
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-6 col-xs-6">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="home-3.html" title="Doyle">
                            <img class="img-responsive" src="<?=$this->Utilities->generateUrlAsset(null,$defaultWebSettings['Web.Logo']);?>" alt="img" style="max-height:50px;">
                        </a>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <!-- Main Menu -->
                    <nav id="main-nav">
                        <ul class="nav navbar-nav">
                            <?=$this->Utilities->generateLinkHeader($linksMaps['HEADER']);?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>