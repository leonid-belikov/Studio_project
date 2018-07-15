<section id="userroom">
    <div class="wrapper">
        <div class="container">
            <div class="row justify-content-end">
                <h1>personal cabinet</h1>
            </div>


            <div class="row">
                <div class="col-4 order-menu">
                    <div class="order-menu-item" id="open-order"><p>make new order</p></div>
                    <div class="order-menu-item" id="inc-orders"><p>uncompleted orders</p></div>
                    <div class="order-menu-item" id="comp-orders"><p>completed orders</p></div>
                </div>


                <div class="col-8 order-area">

<!--                    <form id="hidden_form">-->
<!--                        <input name="login" value="">-->
<!--                    </form>-->

                <!-- 1 пункт меню -->
                    <div class="order-res" id="open-order-div">

                        <h2>order form</h2>

                        <form id="order_form">
                            <div class="row">
                                <div class="col-3"><label for="order-title">title</label></div>
                                <div class="col-9"><input name="order-title" id="order-title"></div>
                            </div>
                            <div class="row">
                                <div class="col-3"><label for="order-specific">specification</label></div>
                                <div class="col-9"><textarea name="order-specific" id="order-specific"></textarea></div>
                            </div>
                            <div class="row">
                                <div class="col-3"><label for="order-deadline">deadline</label></div>
                                <div class="col-9"><input name="order-deadline" id="order-deadline"></div>
                            </div>
                            <div class="row">
                                <div class="col-3"><label for="order-cost">cost</label></div>
                                <div class="col-9"><input name="order-cost" id="order-cost"></div>
                            </div>

                            <div class="row">
                                <div class="col-6"><input type="reset" value="clear form"></div>
                                <div class="col-6"><input type="submit" value="send"></div>
                            </div>



                        </form>

                    </div>

                    <!-- 2 пункт меню -->
                    <div class="order-res" id="inc-orders-div">

                    </div>

                    <!-- 3 пункт меню -->
                    <div class="order-res" id="comp-orders-div">

                    </div>

        </div>
    </div>
</section>