<table class="table table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Employer</th>
      <th>Employee Type</th>
      <th>Brand</th>
      <th>Project Name</th>
      <th>Service Years</th>
      <th>Inquiry Date</th>
    </tr>
  </thead>
  <tbody>
    <?php if(isset($all_emails) && $all_emails != null): ?>
      <?php foreach ($all_emails as $email) { ?>
        <tr>
          <td><?php echo $email->name != "" ? $email->name : "N/A"; ?></td>
          <td><?php echo $email->email != "" ? $email->email : "N/A"; ?></td>
          <td><?php echo $email->employer != "" ? $email->employer : "N/A"; ?></td>
          <td><?php echo $email->employee_type != "" ? $email->employee_type : "N/A"; ?></td>
          <td><?php echo $email->brand != "" ? $email->brand : "N/A"; ?></td>
          <td><?php echo $email->project_name != "" ? $email->project_name : "N/A"; ?></td>
          <td><?php echo $email->service_years != "" ? $email->service_years : "N/A"; ?></td>
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
      <th>Employee Type</th>
      <th>Brand</th>
      <th>Project Name</th>
      <th>Service Years</th>
      <th>Inquiry Date</th>
    </tr>
  </tfoot>
</table>
