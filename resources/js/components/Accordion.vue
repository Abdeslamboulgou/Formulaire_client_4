<template>
  <div class="nav_bar">
    <div class="faisons-co">
      <a style="text-decoration: none"> FAISONS CONNAISSANCE </a>
    </div>
    <div class="compte"><a style="text-decoration: none"> MON COMPTE </a></div>
    <div class="tableau">
      <a style="text-decoration: none"> TABLEAU DE BORD </a>
    </div>
  </div>

  <div class="accordion" id="accordionExample">
    <!--Vous êtes vendeur-->
    <h2 class="accordion-header" id="headingOne">
      <h2 class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
        aria-expanded="false" aria-controls="collapseOne">
        Vous êtes vendeur ?
      </h2>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
      data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form name="theform" @submit.prevent="addFormSeller">
          <div class="row">
            <div class="col-md-8">
              <label class="control-label">Disposez vous d'un site marchand ?
              </label>
            </div>
            <div class="col-md-4">
              <input @change="validerForm" class="form-check-input" type="radio" name="inlineRadioOptions1"
                id="inlineRadio1" value="1" v-model="sellerForm.hasSite" />
              <label class="form-check-label" for="inlineRadio1">Oui</label>
              <input @change="validerForm" class="form-check-input" type="radio" name="inlineRadioOptions1"
                id="inlineRadio2" value="0" v-model="sellerForm.hasSite" />
              <label class="form-check-label" for="inlineRadio1">Non</label>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <label class="control-label">Voulez-vous intégrer des négociations de prix sur votre site
                marchand ?
              </label>
            </div>
            <div class="col-md-4">
              <input @change="validerForm" class="form-check-input" type="radio" name="inlineRadioOptions2"
                id="inlineRadio3" value="1" v-model="sellerForm.negoSite" />

              <label class="form-check-label" for="inlineRadio2">Oui</label>
              <input @change="validerForm" class="form-check-input" type="radio" name="inlineRadioOptions2"
                id="inlineRadio4" value="0" v-model="sellerForm.negoSite" />
              <label class="form-check-label" for="inlineRadio2">Non</label>

            </div>
          </div>


          <div id="site" class="row" v-if="sellerForm.negoSite == '1'">
            <div class="col-md-8">
              <label class="control-label">Quelle est l'adresse de votre site *</label>
            </div>
            <div class="col-md-4">
              <input @change="validerForm" type="text" name="" class="form-control"
                placeholder="adresse de votre site *" required="required" data-error=" le lien est obligatoire."
                style="height:90%;width:70%;" v-model="sellerForm.adressUrl" />
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <label class="control-label">Souhaitez-vous être mis en relation avec nos équipes ?</label>
            </div>
            <div class="col-md-4">
              <input @change="validerForm" class="form-check-input" type="radio" name="inlineRadioOptions3"
                id="inlineRadio3" value="1" v-model="sellerForm.teamContact" />
              <label class="form-check-label" for="inlineRadio3">Oui</label>
              <input @change="validerForm" class="form-check-input" type="radio" name="inlineRadioOptions3"
                id="inlineRadio6" value="0" v-model="sellerForm.teamContact" />
              <label class="form-check-label" for="inlineRadio3">Non</label>
            </div>
          </div>
          <div id="emailVendeur" class="row" v-if="sellerForm.teamContact == '1'">
            <div class="col-md-8">
              <label class="control-label">Quelle est votre adresse mail *</label>
            </div>
            <div class="col-md-4">
              <input @change="validerForm" id="" type="text" name="" class="form-control" placeholder="adresse mail *"
                required="required" data-error=" l'email est obligatoire." style="height:90%;width:70%;"
                v-model="sellerForm.email" />
            </div>
          </div>
          <div id="btn">
            <input type="submit" class="btn-submit" data-bs-toggle="modal" :data-bs-target="'#MyModal' + valideForm"
              value="Valider" />
          </div>
        </form>
      </div>
    </div>
    <!--Vous êtes acheteur dans le secteur public-->
    <h2 class="accordion-header" id="headingTwo">
      <h2 class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
        aria-expanded="false" aria-controls="collapseTwo">
        Vous êtes acheteur dans le secteur public
      </h2>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
      data-bs-parent="#accordionExample">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 offset-xl-2 py-5">
            <h3>Formulaire de contact</h3>
            <form name="theform" @submit.prevent="addFormUser(1)">
              <div class="messages"></div>

              <div class="controls">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="form_name">Titre *</label>
                      <input id="form_name" type="text" name="name" class="form-control" v-model="titrePublic"
                        disabled />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_name">Nom *</label>
                      <input @change="validerForm" id="form_name" type="text" name="name" class="form-control"
                        placeholder="Veuillez entrer votre nom *" required="required" data-error="Nom est obligatoire."
                        v-model="userForm.lastName" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_lastname">Prénom *</label>
                      <input @change="validerForm" id="form_lastname" type="text" name="surname" class="form-control"
                        placeholder="Veuillez entre votre prénom *" required="required"
                        data-error="Prénom est obligatoire." v-model="userForm.firstName" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_email">Email *</label>
                      <input @change="validerForm" id="form_email" type="email" name="email" class="form-control"
                        placeholder="Veuillez entrer votre email *" required="required"
                        data-error="Un email valid est obligatoire." v-model="userForm.email" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_adresse">Adresse *</label>
                      <input @change="validerForm" id="form_adresse" type="text" name="text" class="form-control"
                        placeholder="Veuillez entrer votre Adresse *" required="required" v-model="userForm.adress" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_postal">Code postal *</label>
                      <input @change="validerForm" id="form_postal" type="number" name="number" class="form-control"
                        placeholder="Veuillez entrer votre code postal *" required="required"
                        v-model="userForm.codePostal" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_postal">Ville *</label>
                      <input @change="validerForm" id="form_ville" type="text" name="text" class="form-control"
                        placeholder="Veuillez entrer votre ville *" required="required" v-model="userForm.city" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="form_message">Message *</label>
                      <textarea @change="validerForm" id="form_message" name="message" class="form-control"
                        placeholder="Votre Message *" rows="4" required="required"
                        data-error="Veuillez remplir le champ Message." v-model="userForm.message"></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div id="btn">
                    <input type="submit" class="btn-submit" data-bs-toggle="modal"
                      :data-bs-target="'#MyModal' + valideForm" value="Envoyer" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-muted">
                      <strong>*</strong> Ces champs sont obligatoires.
                    </p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Vous êtes acheteur dans le secteur privé-->
    <h2 class="accordion-header" id="headingThree">
      <h2 class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
        aria-expanded="false" aria-controls="collapseThree">
        Vous êtes acheteur dans le secteur privé
      </h2>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
      data-bs-parent="#accordionExample">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 offset-xl-2 py-5">
            <h3>Formulaire de contact</h3>
            <form name="theform" @submit.prevent="addFormUser(2)">
              <div class="messages"></div>

              <div class="controls">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="form_name">Titre *</label>
                      <input id="form_name" type="text" name="name" class="form-control" v-model="titrePrive"
                        disabled />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_name">Nom *</label>
                      <input @change="validerForm" id="form_name" type="text" name="name" class="form-control"
                        placeholder="Veuillez entrer votre nom *" required="required" data-error="Nom est obligatoire."
                        v-model="userForm.lastName" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_lastname">Prénom *</label>
                      <input @change="validerForm" id="form_lastname" type="text" name="surname" class="form-control"
                        placeholder="Veuillez entrer votre prénom *" required="required"
                        data-error="Prénom est obligatoire." v-model="userForm.firstName" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_email">Email *</label>
                      <input @change="validerForm" id="form_email" type="email" name="email" class="form-control"
                        placeholder="Veuillez entrer votre email *" required="required"
                        data-error="Un email valid est obligatoire." v-model="userForm.email" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_adresse">Adresse *</label>
                      <input @change="validerForm" id="form_adresse" type="text" name="text" class="form-control"
                        placeholder="Veuillez entrer votre Adresse *" required="required" v-model="userForm.adress" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_postal">Code postal *</label>
                      <input @change="validerForm" id="form_postal" type="number" name="number" class="form-control"
                        placeholder="Veuillez entrer votre code postal *" required="required"
                        v-model="userForm.codePostal" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_postal">Ville *</label>
                      <input @change="validerForm" id="form_ville" type="text" name="text" class="form-control"
                        placeholder="Veuillez entrer votre ville *" required="required" v-model="userForm.city" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="form_message">Message *</label>
                      <textarea @change="validerForm" id="form_message" name="message" class="form-control"
                        placeholder="Votre Message *" rows="4" required="required"
                        data-error="Veuillez remplir le champ Message." v-model="userForm.message"></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div id="btn">
                    <input type="submit" class="btn-submit" data-bs-toggle="modal"
                      :data-bs-target="'#MyModal' + valideForm" value="Envoyer" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-muted">
                      <strong>*</strong> Ces champs sont obligatoires.
                    </p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Vous êtes intermédiaire de vente ou d'achat-->
    <h2 class="accordion-header" id="headingFour">
      <h2 class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
        aria-expanded="false" aria-controls="collapseFour">
        Vous êtes intermédiaire de vente ou d'achat
      </h2>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
      data-bs-parent="#accordionExample">
      <div class="container">

        <div class="row">
          <div class="col-xl-8 offset-xl-2 py-5">
            <h3>Formulaire de contact</h3>
            <form name="theform" @submit.prevent="addFormUser(3)">
              <div class="messages"></div>

              <div class="controls">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="form_name">Titre *</label>
                      <input id="form_name" type="text" name="name" class="form-control" v-model="titreInter"
                        disabled />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_name">Nom *</label>
                      <input @change="validerForm" id="form_name" type="text" name="name" class="form-control"
                        placeholder="Veuillez entrer votre nom *" required="required" data-error="Nom est obligatoire."
                        v-model="userForm.lastName" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_lastname">Prénom *</label>
                      <input @change="validerForm" id="form_lastname" type="text" name="surname" class="form-control"
                        placeholder="Veuillez entre votre prénom *" required="required"
                        data-error="Prénom est obligatoire." v-model="userForm.firstName" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_email">Email *</label>
                      <input @change="validerForm" id="form_email" type="email" name="email" class="form-control"
                        placeholder="Veuillez entrer votre email *" required="required"
                        data-error="Un email valid est obligatoire." v-model="userForm.email" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_adresse">Adresse *</label>
                      <input @change="validerForm" id="form_adresse" type="text" name="text" class="form-control"
                        placeholder="Veuillez entrer votre Adresse *" required="required" v-model="userForm.adress" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_postal">Code postal *</label>
                      <input @change="validerForm" id="form_postal" type="number" name="number" class="form-control"
                        placeholder="Veuillez entrer votre code postal *" required="required"
                        v-model="userForm.codePostal" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_postal">Ville *</label>
                      <input @change="validerForm" id="form_ville" type="text" name="text" class="form-control"
                        placeholder="Veuillez entrer votre ville *" required="required" v-model="userForm.city" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="form_message">Message *</label>
                      <textarea @change="validerForm" id="form_message" name="message" class="form-control"
                        placeholder="Votre Message *" rows="4" required="required"
                        data-error="Veuillez remplir le champ Message." v-model="userForm.message"></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div id="btn">
                    <input type="submit" class="btn-submit" data-bs-toggle="modal"
                      :data-bs-target="'#MyModal' + valideForm" value="Envoyer" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-muted">
                      <strong>*</strong> Ces champs sont obligatoires.
                    </p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!--Autres situations-->
    <h2 class="accordion-header" id="headingFive">
      <h2 class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive"
        aria-expanded="false" aria-controls="collapseFive">
        Autres situations
      </h2>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
      data-bs-parent="#accordionExample">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 offset-xl-2 py-5">
            <h3>Formulaire de contact</h3>

            <form name="theform" @submit.prevent="addFormUser(4)">
              <div class="messages"></div>

              <div class="controls">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="form_name">Titre *</label>
                      <input id="form_name" type="text" name="name" class="form-control" v-model="titreAutre"
                        disabled />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_name">Nom *</label>
                      <input @change="validerForm" id="form_name" type="text" name="name" class="form-control"
                        placeholder="Veuillez entrer votre nom *" required="required" data-error="Nom est obligatoire."
                        v-model="userForm.lastName" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_lastname">Prénom *</label>
                      <input @change="validerForm" id="form_lastname" type="text" name="surname" class="form-control"
                        placeholder="Veuillez entre votre prénom *" required="required"
                        data-error="Prénom est obligatoire." v-model="userForm.firstName" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_email">Email *</label>
                      <input @change="validerForm" id="form_email" type="email" name="email" class="form-control"
                        placeholder="Veuillez entrer votre email *" required="required"
                        data-error="Un email valid est obligatoire." v-model="userForm.email" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_adresse">Adresse *</label>
                      <input @change="validerForm" id="form_adresse" type="text" name="text" class="form-control"
                        placeholder="Veuillez entrer votre Adresse *" required="required" v-model="userForm.adress" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_postal">Code postal *</label>
                      <input @change="validerForm" id="form_postal" type="number" name="number" class="form-control"
                        placeholder="Veuillez entrer votre code postal *" required="required"
                        v-model="userForm.codePostal" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_postal">Ville *</label>
                      <input @change="validerForm" id="form_ville" type="text" name="text" class="form-control"
                        placeholder="Veuillez entrer votre ville *" required="required" v-model="userForm.city" />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="form_message">Message *</label>
                      <textarea @change="validerForm" id="form_message" name="message" class="form-control"
                        placeholder="Votre Message *" rows="4" required="required"
                        data-error="Veuillez remplir le champ Message." v-model="userForm.message"></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div id="btn">
                    <input id="submitButton" type="submit" class="btn-submit" data-bs-toggle="modal"
                      :data-bs-target="'#MyModal' + valideForm" value="Envoyer" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-muted">
                      <strong>*</strong> Ces champs sont obligatoires.
                    </p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--popup envoie formulaire-->

  <div class="modal" :id="'MyModal' + true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!--popup header-->

        <!--popup body-->
        <div class="modal-body">
          <h4 class="modal-title" style="color: green">
            Votre demande a été envoyé avec succés !
          </h4>
        </div>
        <!--popup footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" @click="resetInput()">
            Ok
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" :id="'MyModal' + false">
    <div class="modal-dialog">
      <div class="modal-content">
        <!--popup header-->

        <!--popup body-->
        <div class="modal-body">
          <h4 class="modal-title" style="color: #a71715">
            veuillez remplir toutes les champs !
          </h4>
        </div>
        <!--popup footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            Ok
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      valideForm: false,
      sellerForm: {},
      userForm: {},
      titrePrive: "Acheteur secteur privé",
      titrePublic: "Acheteur secteur public",
      titreInter: "Intermédiare de vente",
      titreAutre: "Autre Situation",
    };
  },
  methods: {
    addFormUser(n) {

      if (n == 1) {
        this.userForm['type'] = this.titrePublic
      } else if (n == 2) {
        this.userForm['type'] = this.titrePrive
      } else if (n == 3) {
        this.userForm['type'] = this.titreInter
      } else if (n == 4) {
        this.userForm['type'] = this.titreAutre
      }
      axios
        .post("http://localhost:8000/api/store", this.userForm)

        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));

    },


    addFormSeller() {

      var dict = this.sellerForm;
      for (var key in dict) {
        if ((key = !0) && (key = !1)) {
          dict[key] = Number(dict[key]);
        }
      }
      axios
        .post("http://localhost:8000/api/sellerStore", this.sellerForm)
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
      console.log(dict);
    },
    resetInput() {
      this.userForm = {};
      this.sellerForm = {};
      this.valideForm = false;
    },

    validerForm() {
      var f = document.forms["theform"].elements;
     
      for (var i = 0; i < f.length; i++) {
        if (f[i].value.length == 0)
          this.valideForm = false;
          else
             this.valideForm = true;
      }
    }
  },
};
</script>



