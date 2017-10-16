<?php include 'connect.php';
include 'login.php';
include 'header.php';
?>

<div class="pricing">
<div class ="pricingleft">
<div>
    <article>
        <img id="" src="img/icon3.png">
        <p class="pricingtitle"> Low Cost </p>
        <p class="pricingtext"> Donec sodales neque quis rhoncus dictum. In a sodales dolor. Ut fringilla ut augue sit amet iaculis. Proin ullamcorper vitae augue at vestibulum. Fusce erat nisl, laoreet ut purus vel, porta ullamcorper nisi. Maecenas pretium quis lacus vitae posuere. Vivamus pharetra, lorem eu luctus pharetra, diam magna lobortis sem, ut cursus velit diam at nunc. Aenean rutrum lacus vel purus. </p>
    </article>
</div>

<div>
    <article>
        <img id="" src="img/icon4.png">
        <p class="pricingtitle"> Quick Response </p>

        <p class="pricingtext"> Donec sodales neque quis rhoncus dictum. In a sodales dolor. Ut fringilla ut augue sit amet iaculis. Proin ullamcorper vitae augue at vestibulum. Fusce erat nisl, laoreet ut purus vel, porta ullamcorper nisi. Maecenas pretium quis lacus vitae posuere. Vivamus pharetra, lorem eu luctus pharetra, diam magna lobortis sem, ut cursus velit diam at nunc. Aenean rutrum lacus vel purus.</p>
    </article>
</div>

</div>

<div class ="pricingright">
  <div>
    <form method="post" class="form">
      <label id="priceestimate">Price Estimate</label><br><br>
      <label for="tutor">Tutor</label>
      <select id="tutor" name="tutor" onchange="calculator()">
        <option value="david">David</option>
        <option value="jimmy">Jimmy</option>
        <option value="jones">Jones</option>
      </select>
      <label for="hours">Hours</label>
      <select id="hours" name="hours" onchange="calculator()">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
      Price <input type="text" id="price" value="$0.00" readonly><br>
    </form>
  </div>


</div>
</div>
