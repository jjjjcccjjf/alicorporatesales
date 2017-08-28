<table class="table table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Property Purchased</th>
      <th>Price</th>
      <th>Inquiry Date</th>
    </tr>
  </thead>
  <tbody>
    <?php if(isset($all_emails) && $all_emails != null): ?>
      <?php foreach ($all_emails as $email) { ?>
        <tr>
          <td><?php echo $email->name; ?></td>
          <td><?php echo $email->email; ?></td>
          <td><?php echo $email->property_purchased; ?></td>
          <td><?php echo $email->price; ?></td>
          <td><?php echo $email->date_sent != "" ? date("m/d/Y H:i:s", strtotime($email->date_sent)) : "N/A"; ?></td>
        </tr>
      <?php } ?>
    <?php else:?>
      <tr>
        <td colspan="<?php echo $td_colspan; ?>"><center>No records found.</center></td>
      </tr>
    <?php endif; ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Property Purchased</th>
      <th>Price</th>
      <th>Inquiry Date</th>
    </tr>
  </tfoot>
</table>
