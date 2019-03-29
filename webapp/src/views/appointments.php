<?php
$title = localize('PageTitle-Appointments');
ob_start();
?>

<div class="border mx-auto" style="margin-top: 30px; width: 90%">
<div class="search-header">
    <input id="search_customer" type="text" class="form-control search-bar" onkeyup="SearchCustomer()"
    name="search_customer" placeholder='<?php echo localize('searchClient'); ?>' />
    <a href="?action=appointmentCreator" class="btn btn-success">
        <i class="fa fa-plus fa-lg"></i> <?php echo localize('Appointments-Add'); ?>
    </a>
</div>

<table class="table table-sm table-striped table-hover" id="tbl_appointments">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Client</th>
            <th scope="col">Téléphone</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $rendezvous = CallAPI('GET', 'Appointments/AppointmentsAndCustomers');
        //var_dump($rendezvous[0]->appointment->idCustomer);

        $appointments = array(
            1 => array(
                "appointmentDateTime" => "2019-03-26T13:00:00",
                "durationTime" => "1000-01-01T01:30:00",
                "idCustomer" => 2,
            ),
                2 => array(
                    "appointmentDateTime" => "2019-03-26T13:00:00",
                    "durationTime" => "1000-01-01T01:30:00",
                    "idCustomer" => 2,
                ),
                    3 => array(
                        "appointmentDateTime" => "2019-03-26T13:00:00",
                        "durationTime" => "1000-01-01T01:30:00",
                        "idCustomer" => 2,
                    ),
                        4 => array(
                            "appointmentDateTime" => "2019-03-26T13:00:00",
                            "durationTime" => "1000-01-01T01:30:00",
                            "idCustomer" => 2,
                        ),
            5 => array(
                "appointmentDateTime" => "2019-03-26T15:00:00",
                "durationTime" => "1000-01-01T01:00:00",
                "idCustomer" => 1,
            )
        );
        $customers = array(
            1 => array(
                "sex" => "M",
                "firstName" => "Jessy",
                "lastName" => "Rodrigue",
                "birthDate" => "1997-02-08T00:00:00",
                "occupation" => "SysAdmin",
                "phone" => "(418) 774-3835"
            ),
            2 => array(
                "sex" => "M",
                "firstName" => "Yannick",
                "lastName" => "Jacques",
                "birthDate" => "1997-08-31T00:00:00",
                "occupation" => "Programmer",
                "phone" => "(418) 230-3983"
            )
        );
        $count =0;
        foreach ($rendezvous as $appointment) {
        ?>
        <tr id="<?php echo $appointment->appointment->idCustomer; ?>">
            <td scope="row">
            <?php
                $appointmentDate = new DateTime($appointment->appointment->appointmentDateTime);
                echo $appointmentDate->format('Y-m-d');
            ?>
            </td>
            <td>
            <?php
                echo $appointmentDate->format('H:i');
            ?>
            </td>
            <td>
            <?php
                echo $appointment->customer->firstName
                    ." ".
                    $appointment->customer->lastName;
            ?>
            </td>
            <td>
            <?php
            foreach ($appointment->phoneNumbers as $phoneNumber) {
            ?>
                <table style="width:100%; background-color: rgba(255,255,255,0)">
                    <tr>
                        <th><?php echo $phoneNumber->idPhoneType; ?></th>
                        <td><?php echo $phoneNumber->phonenumber.$phoneNumber->extension; ?></td>
                    </tr>
                </table>
            <?php
            }
            ?>
            </td>
        </tr>
        <?php
            $count++;
        }
        ?>
    </tbody>
</table>
</div>
<?php
  $contenu = ob_get_clean();
  $onHomePage = false;
  require 'gabarit.php';
  require 'OnClick.html'
?>
