<?php
$titre = 'AppointmentCreation';
ob_start(); ?>
    <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
        <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2">Nouveau rendez-vous</h3>
            <form class="row w3pvt-info-para pt-lg-5 pt-md-4 pt-3" action="?action=makeAppointment" method="post">
                <div class="col-lg-6 col-md-6">
                    <h4>Détails du rendez-vous</h4>
                    <div class="w3pvt-wls-contact-mid">
                        <div class="form-group contact-forms">
                            <label for="email"><p>Date</p></label>
                            <input type="date" id="email" name="email" class="form-control" placeholder="Adresse courriel" value="<?php if (isset($_POST['email'])) {
                            echo $_POST['email'];
                        } ?>">
                        </div>
                        <div class="form-group contact-forms">
                            <label for="password"><p>Heure</p></label>
                            <input type="time" name="password" id="password" class="form-control" placeholder="Mot de passe" required="">
                        </div>
                        <div class="form-group contact-forms">
                            <label for="appointment_lenght">Durée</label>
                            <select>
                                <option value="1:00">1 Heure</option>
                                <option value="1:30">1 Heure 30 Minutes</option>
                            </select>
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
                <button type="submit" class="btn sent-butnn">Vérifier la disponibilité</button>
            </form>
        </div>
    </section>

<?php
require('OnClick.html');
$contenu = ob_get_clean();
$onHomePage = false;
require 'gabarit.php'; ?>
