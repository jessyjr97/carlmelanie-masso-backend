<?php
$titre = 'AppointmentCreation';
ob_start(); ?>
    <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
        <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2">Nouveau rendez-vous</h3>
            <form class="row w3pvt-info-para pt-lg-5 pt-md-4 pt-3" id="frm_newAppointment" method="post">
                <div class="col-lg-6 col-md-6">
                    <h4>Détails du rendez-vous</h4>
                    <div class="w3pvt-wls-contact-mid">
                        <div class="form-group contact-forms">
                            <label for="appointmentDate"><p>Date</p></label>
                            <input type="date" id="appointmentDate" name="appointmentDate" class="form-control" placeholder="Date du rendez-vous" required>
                        </div>
                        <div class="form-group contact-forms">
                            <label for="appointmentTime"><p>Heure</p></label>
                            <input type="time" name="appointmentTime" id="appointmentTime" class="form-control" placeholder="Heure du rendez-vous" required>
                        </div>
                        <div class="form-group contact-forms">
                            <label for="appointmentLength">Durée</label>
                            <input list="appointmentLengthChoices" id="appointmentLength" name="appointmentLength">
                            <datalist id="appointmentLengthChoices">
                              <option value="1:00">
                              <option value="1:30">
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 ">
                    <div >
                        <h4>Informations du client</h4>
                    </div>
                    <div class=" mt-3">
                        <table class="table table-sm table-hover" id="tbl_customers">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Téléphone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $customers = CallAPI('GET', 'Customers');
                                $count =0;
                                foreach ($customers as $customer) {
                                    ?>
                                <tr class="clickable-row" id="<?php echo $customer->id; ?>">
                                    <td scope="row">
                                    <?php
                                        echo $customer->firstName; ?>
                                    </td>
                                    <td>
                                    <?php
                                        echo $customer->lastName; ?>
                                    </td>
                                    <td>
                                    <?php
                                    $phoneNumbers = CallAPI('GET', 'CustomerPhoneNumbers/ForCustomer/'.($customer->id));
                                    foreach ($phoneNumbers as $phoneNumber) {
                                        ?>
                                        <table style="width:100%; background-color: rgba(255,255,255,0)">
                                            <tr>
                                                <th><?php //echo $phoneNumber->idPhoneType; ?></th>
                                                <td><?php echo $phoneNumber->phonenumber.$phoneNumber->extension; ?></td>
                                            </tr>
                                        </table>
                                    <?php
                                    } ?>
                                    </td>
                                </tr>
                                <?php
                                    $count++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <input type="button" value='Prendre un rendez-vous' class="btn sent-butnn" id="btn_makeAppointment"></input>
                <div id="submitResult"></div>
            </form>
        </div>
    </section>

<?php
require('OnClick.html');
$contenu = ob_get_clean();
$onHomePage = false;
require 'gabarit.php'; ?>
