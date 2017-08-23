<table class="table table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Employer</th>
      <th>Mobile</th>
      <th>Phone</th>
      <th style="width:30%">Message</th>
      <th>Send More</th>
      <th>Inquiry Date</th>
    </tr>
  </thead>
  <tbody>
    <?php if(isset($all_emails) && $all_emails != null): ?>
      <?php foreach ($all_emails as $email) { ?>
        <tr>
          <td><?php echo $email->name; ?></td>
          <td><?php echo $email->email; ?></td>
          <td><?php echo $email->employer != "" ? $email->employer : "N/A"; ?></td>
          <td><?php echo $email->mobile != "" ? $email->mobile : "N/A"; ?></td>
          <td><?php echo $email->phone != "" ? $email->phone : "N/A"; ?></td>
          <td><?php echo $email->message != "" ? $email->message : "N/A"; ?></td>
          <td><?php echo $email->send_me_more == 1 ? "Yes" : "No"; ?></td>
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
      <th>Employer</th>
      <th>Mobile</th>
      <th>Phone</th>
      <th style="width:30%">Message</th>
      <th>Send More</th>
      <th>Inquiry Date</th>
    </tr>
  </tfoot>
</table>
