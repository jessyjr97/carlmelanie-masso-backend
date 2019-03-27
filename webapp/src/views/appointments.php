<?php
$title = localize('PageTitle-Appointments');
ob_start();
?>

<form class="form-inline">
    <div class="input-group">
        <input id="search_customer" type="text" class="form-control" onkeyup="SearchCustomer()"
        name="search_customer" placeholder=<?php echo localize('searchClient'); ?>/>
    </div>
</form>

<table class="container" id="tbl_appointments">
    <thead>
        <tr class="row">
            <th class="col-sm">Date</th>
            <th class="col-sm">Heure</th>
            <th class="col-sm">Client</th>
            <th class="col-sm">Téléphone</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $appointments = array(
            1 => array(
                "appointmentDateTime" => "2019-03-26T13:00:00",
                "durationTime" => "1000-01-01T01:30:00",
                "idCustomer" => 2,
            ),
            2 => array(
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
        foreach ($appointments as $appointment) {
        ?>
        <tr class ="row customrow" id="<?php echo $appointment["idCustomer"]; ?>">
            <td class="col-sm">
            <?php
                $appointmentDate = new DateTime($appointment["appointmentDateTime"]);
                echo $appointmentDate->format('Y-m-d');
            ?>
            </td>
            <td class="col-sm">
            <?php
                echo $appointmentDate->format('H:i');
            ?>
            </td>
            <td class="col-sm">
            <?php
                echo $customers[$appointment["idCustomer"]]["firstName"]
                    ." ".
                    $customers[$appointment["idCustomer"]]["lastName"];
            ?>
            </td>
            <td class="col-sm" id="customer_phone_number">
            <?php
                echo $customers[$appointment["idCustomer"]]["phone"];
            ?>
            </td>
        </tr>
        <?php
            $count++;
        }
        ?>
    </tbody>
</table>
<?php
  $contenu = ob_get_clean();
  $onHomePage = false;
  require 'gabarit.php';
  require 'OnClick.html'
?>
