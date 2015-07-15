Silver : <?php echo (20-$silver); ?>


<form action="<?php echo site_url('booking/confirmation') ?>">
    <input type="text" name="name">
    <input type="text" name="contactnumber">
    <input type="text" name="email">
    <input type="text" name="quantity">
    <select name="category">
        <option value="silver">Silver</option>
        <option value="gold">Gold</option>
        <option value="diamond">Diamond</option>
        <option value="vip">VIP</option>
    </select>
    <input type="submit">
</form>