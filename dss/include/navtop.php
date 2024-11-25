   <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="pull-right">
                <form name="clock">
                    <div class="time">
                    
                    <i class="fa fa-clock" aria-hidden="true" id="clock"></i> <span id="current-time"></span>

                    <script>

                        let time = document.getElementById("current-time");

                        setInterval(() =>{

                            let d = new Date();
                            time.innerHTML = d.toLocaleTimeString();

                        },1000)

                    </script>
                </div>

                    <div class="date">
                    <i class="fa fa-calendar " id="clock"></i>
                    <?php
                    $Today = date('y:m:d');
                    $new = date('l, F d, Y', strtotime($Today));
                    echo $new;
                    ?>
                </div>
                </form>
            </div>

            <div class="welcome">
            </div>
        </div>
    </div>