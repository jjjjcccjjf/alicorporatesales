<table class="table table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Contact #</th>
      <th>Type of share</th>
      <th>Message</th>
      <th>Inquiry Date</th>
    </tr>
  </thead>
  <tbody>
    <?php if(isset($all_emails) && $all_emails != null): ?>
      <?php foreach ($all_emails as $email) { ?>
        <tr>
          <td><?php echo $email->name != "" ? $email->name : "N/A"; ?></td>
          <td><?php echo $email->email != "" ? $email->email : "N/A"; ?></td>
          <td><?php echo $email->contact_num != "" ? $email->contact_num : "N/A"; ?></td>
          <td><?php echo $email->type_of_share != "" ? $email->type_of_share : "N/A"; ?></td>
          <td><?php echo $email->message != "" ? $email->message : "N/A"; ?></td>
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
      <th>Contact #</th>
      <th>Type of share</th>
      <th>Message</th>
      <th>Inquiry Date</th>
    </tr>
  </tfoot>
</table>
