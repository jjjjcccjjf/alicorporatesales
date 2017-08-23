<table class="table table-bordered">
  <thead>
    <tr>
      <th>Referral Name</th>
      <th>Brand</th>
      <th>Project</th>
      <th>Contact</th>
      <th>Email</th>
      <th style="width:30%">Referred By</th>
      <th>Inquiry Date</th>
    </tr>
  </thead>
  <tbody>
    <?php if(isset($all_emails) && $all_emails != null): ?>
      <?php foreach ($all_emails as $email) { ?>
        <tr>
          <td><?php echo $email->name != "" ? $email->name : "N/A"; ?></td>
          <td><?php echo $email->brand != "" ? $email->brand : "N/A"; ?></td>
          <td><?php echo $email->project != "" ? $email->project : "N/A"; ?></td>
          <td><?php echo $email->contact != "" ? $email->contact : "N/A"; ?></td>
          <td><?php echo $email->email != "" ? $email->email : "N/A"; ?></td>
          <td>
          Employer: <?php echo $email->referee[0]->employer; ?><br>
          Name: <?php echo $email->referee[0]->name; ?><br>
          Contact: <?php echo $email->referee[0]->contact; ?><br>
          Email: <?php echo $email->referee[0]->email; ?>
          </td>
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
      <th>Referral Name</th>
      <th>Brand</th>
      <th>Project</th>
      <th>Contact</th>
      <th>Email</th>
      <th style="width:30%">Referred By</th>
      <th>Inquiry Date</th>
    </tr>
  </tfoot>
</table>
