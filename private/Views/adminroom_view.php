<section id="adminroom">
    <div class="wrapper">
        <div class="container">
            <div class="row justify-content-end">
                <h1>site administration</h1>
            </div>


            <div class="row">
                <div class="col-4 view-menu">
                    <div class="view-menu-item" id="view-orders"><p>view orders</p></div>
                    <div class="view-menu-item" id="view-users"><p>view users</p></div>
                    <div class="view-menu-item" id="change-status"><p>change order status</p></div>
                </div>


                <div class="col-8 view-area">

                    <!-- 1 пункт меню -->
                    <div class="view-res" id="view-orders-div">

                        <p>- "I like admin's job!"</p>




                    </div>

                    <!-- 2 пункт меню -->
                    <div class="view-res" id="view-users-div">

                    </div>

                    <!-- 3 пункт меню -->
                    <div class="view-res" id="change-status-div">

                        <h2>change status</h2>

                        <form id="change-status-form">
                            <div class="row">
                                <div class="col-4"><label for="changing-order">order number</label></div>
                                <div class="col-8"><input name="changing-order" id="changing-order"></div>
                            </div>

                            <div class="row">
                                <div class="col-4"><label for="changing-status">new status</label></div>
                                <div class="col-8"><input name="changing-status" id="changing-status"></div>
                            </div>


                            <input type="submit" value="change">
                        </form>

                    </div>

                </div>
            </div>
</section>