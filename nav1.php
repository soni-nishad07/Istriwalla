




<!-- -----------------------------------Header---------------------------- -->

<?php session_start(); ?>


<!---------------------------------------------------- Navbar -------------------------------------->

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container  nav-container">
        <a class="navbar-brand" href="index">
            <img src="images/logo.png" alt="" class="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about">About</a></li>

                <li class="nav-item"><a class="nav-link" href="service">Service</a></li>
                <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>


            </ul>





            
            <?php if (isset($_SESSION['full_name'])): ?>
                <!-- If Logged In -->
                <button class="btn book_now me-2" onclick="openBookingModal()">Book Now</button>

                <div class="dropdown d-inline-block">
                    <a class="nav-link dropdown-toggle"  id="userDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php echo $_SESSION['full_name']; ?>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="customer/user_dashboard.php">Dashboard</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>


            <?php else: ?>
                <!-- ❌ Not Logged In: show alert on click -->
                <button class="btn book_now me-2"
                    onclick="alert('Please login first to book a service.'); window.location.href='login.php';">Book
                    Now</button>
            <?php endif; ?>





        </div>
    </div>
</nav>






<!-- Booking Modal -->
<!-- <div class="booking_modal" id="bookingModal" style="display: none;">
    <div class="booking_form_container">
        <button class="close_modal" onclick="closeBookingModal()">&times;</button>
        <h3 class="text-center">Place Your Order</h3>
        <form action="submit_order.php" method="POST">

            <label>Name</label>
            <input type="name" name="cloth_count" id="clothCount" placeholder="Enter number" required
                oninput="calculateAmount()" />


            <label> Address</label>
            <textarea name="address" placeholder="Enter delivery address" required></textarea>

            <label> No of clothes for iron </label>
            <input type="number" name="cloth_count" id="clothCount" placeholder="Enter number" required
                oninput="calculateAmount()" />

            <label>Amount</label>
            <input type="text" id="amountDisplay" readonly value="Rs.10" />

            <label>Payment Mode</label>
            <select name="payment_mode" required>
                <option value="Cash">Cash</option>
            </select>

            <button type="submit" class="submit_btn">Place Order</button>
        </form>

    </div>
</div> -->




<!-- Booking Modal -->
<div class="booking_modal" id="bookingModal" style="display: none;">
    <div class="booking_form_container">
        <button class="close_modal" onclick="closeBookingModal()">&times;</button>
        <h3 class="text-center mb-5">Place Your Order</h3>
        <form action="submit_order.php" method="POST">

            <label>No. of Clothes for Iron</label>
            <input type="number" name="cloth_count" id="clothCount" placeholder="Enter number" required oninput="calculateAmount()" />

            <label>Address</label>
            <textarea name="address" placeholder="Enter delivery address" required></textarea>

            <label>Amount (₹10 per cloth)</label>
            <input type="text" id="amountDisplay" readonly value="Rs. 10" />
            <input type="hidden" name="amount" id="amountHidden" value="10" />

            <label>Payment Mode</label>
            <select name="payment_mode" required>
                <option value="Cash">Cash</option>
            </select>

            <button type="submit" class="submit_btn">Place Order</button>
        </form>
    </div>
</div>

<!-- JS to auto-calculate -->
<script>
function calculateAmount() {
    const count = document.getElementById('clothCount').value || 0;
    const pricePerCloth = 10;
    const total = parseInt(count) * pricePerCloth;
    document.getElementById('amountDisplay').value = `Rs. ${total}`;
    document.getElementById('amountHidden').value = total;
}
</script>

<!-- ------booking js--------- -->
<script>
    function openBookingModal() {
        document.getElementById('bookingModal').style.display = 'flex';
    }

    function closeBookingModal() {
        document.getElementById('bookingModal').style.display = 'none';
    }

</script>


<script>
    $(document).ready(function () {
        $('.navbar-toggler').click(function () {
            $('#navbarNav').collapse('toggle');
        });
    });
</script>




