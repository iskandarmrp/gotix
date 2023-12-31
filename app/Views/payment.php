<div class="w-full bg-white py-7 pl-[24vw] pr-[4vw] flex flex-col">
    <a href="/detail/<?= $movie['title']; ?>" class="text-black text-[30px] font-medium mb-1">
        <div class="w-[2.5vw] h-[2.5vw] relative rounded-[15px] overflow-hidden">
            <img class="w-full h-full object-fill" src="/arrow_back.svg" alt="Arrow Back" />
        </div>
    </a>
    <h1 class="text-[#192553] text-[35px] font-medium mb-5">Order Summary</h1>
    <div class="w-full h-[35vh] flex flex-row relative">
        <div class="w-[20%] h-full relative rounded-[15px] overflow-hidden">
            <img class="w-full h-full object-cover" src="/<?= $movie['posterImg']; ?>" alt=<?= $movie['title']; ?> />
        </div>
        <div class="w-[70%] h-full ml-5 flex flex-col">
            <h1 class="text-[#192553] text-[30px] font-semibold"><?= $movie['title']; ?></h1>
            <p class="text-[#757687] text-[20px] font-normal"><?= $movie['genre']; ?></p>
            <div class="flex flex-row mt-5 mb-5">
                <p class="text-[#192553] text-[20px]"><?= $movie['durationInMins']; ?> Minutes</p>
            </div>
            <p class="text-[#192553] text-[20px] font-medium"><?= (new DateTime($showTime['showtime'], new DateTimeZone('UTC')))->format('d F Y'); ?></p>
            <p class="text-[#192553] text-[20px] font-medium mt-2"><?= (new DateTime($showTime['showtime'], new DateTimeZone('UTC')))->format('H:i'); ?></p>
        </div>
    </div>
    <p class="text-[#192553] font-medium text-[30px] mt-2">Transaction Details</p>
    <div class="flex flex-row justify-between">
        <p class="text-[#192553] text-[20px] font-medium">Tickets</p>
        <p class="text-[#192553] text-[20px] font-medium"><?= implode(', ', $seats); ?></p>
    </div>
    <div class="flex flex-row justify-between">
        <p class="text-[#192553] text-[20px] font-medium">Cinemax Seats</p>
        <div class="flex flex-row">
            <p class="text-[#192553] text-[20px] font-normal">Rp <?= number_format($showTime['price'], 2); ?> x <?= $count; ?> = </p>
            <p class="text-[#192553] text-[20px] font-medium ml-1">Rp <?= number_format($count * $showTime['price'], 2); ?></p>
        </div>
    </div>
    <div class="w-full flex flex-row-reverse">
        <p class="text-[#192553] text-[25px] font-semibold">Total Bill: Rp <?= number_format($count * $showTime['price'], 2); ?></p>
    </div>
    <p class="text-[#192553] font-medium text-[30px] mt-2">Payment Method</p>
    <form action="/purchase" method="post">
        <?= csrf_field(); ?>
        <div class="mt-2">
            <select name="paymentMethod" class="form-control block px-2 py-1 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="paymentMethod">
                <option value="gopay">GoPay</option>
                <option value="ovo">OVO</option>
                <option value="bca">BCA</option>
                <option value="dana">DANA</option>
                <option value="bni">BNI</option>
                <option value="bri">BRI</option>
            </select>
        </div>
        <input type="hidden" name="email" value="<?= $email; ?>">
        <input type="hidden" name="title" value="<?= $movie['title']; ?>">
        <input type="hidden" name="showTime" value="<?= $showTime['scheduleID']; ?>">
        <input type="hidden" name="seats" value="<?= implode(', ', $seats); ?>">

        <button type="submit" class="mt-5 w-[20%] h-[6vh] bg-[#192553] rounded-[15px] text-white text-[20px] font-medium justify-center items-center">Pay Now</button>
    </form>
</div>

</body>

</HTML>