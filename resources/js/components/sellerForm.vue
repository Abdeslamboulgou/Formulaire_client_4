<template>
  <link
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet"
  />
  <div class="container">
    <h3>Demandes vendeurs</h3>
    <div class="row">
      <div class="col-md-4" v-for="seller in sellers" :key="seller.uid">
        <div class="card" id="seller_div">
          <div class="card-block">
            <div class="row align-items-center justify-content-center">
              <div class="col-auto">
                <img
                  class="avatar avatar-xl no-radius"
                  src="./../../../public/assets/request1.svg"
                  alt="..."
                />
              </div>
              <div class="col">
                <h5>User User</h5>
                <span>{{ type }}</span>
              </div>
              <div class="col-auto">
                <a
                  id="botn"
                  class="btn btn-xs fs-10 btn-bold"
                  data-bs-toggle="modal"
                  :data-bs-target="'#MyModal_' + seller.uid"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="10"
                    height="10"
                    fill="currentColor"
                    class="bi bi-trash-fill"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"
                    />
                  </svg>
                </a>
              </div>
            </div>
            <ul class="task-list">
              <li>
                <i class="task-icon bg-c-green"></i>
                <h6>Son email:</h6>
                <p class="text-muted">{{ seller.email }}</p>
              </li>
              <li>
                <i class="task-icon bg-c-green"></i>
                <h6>Son site:</h6>
                <p class="text-muted">{{ seller.adressUrl }}</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="btn-group" role="group">
          <div class="modal" :id="'MyModal_' + seller.uid">
            <div class="modal-dialog">
              <div class="modal-content">
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                ></button>

                <div class="modal-header">
                  <h3 class="modal-title">
                    voulez-vous supprimer ce vendeur ?
                  </h3>
                </div>

                <div class="modal-footer">
                  <!-- botton confirmation supression d'un demande contrat vendeur -->

                  <button
                    class="btn-yes"
                    data-bs-dismiss="modal"
                    @click="deleteSeller(seller.uid)"
                  >
                    Yes
                  </button>

                  <button
                    type="submit"
                    class="btn btn-light"
                    data-bs-dismiss="modal"
                  >
                    No
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import moment from "moment";
export default {
  data() {
    return {
      type: "Vendeur",
      sellers: [],
    };
  },
  created() {
    axios.get("http://localhost:8000/api/sellers").then((response) => {
      this.sellers = response.data.sellers;
    });
  },
  methods: {
    deleteSeller(uid) {
      axios
        .delete(`http://localhost:8000/api/seller/delete/${uid}`)
        .then((response) => {
          let i = this.sellers.map((item) => item.uid).indexOf(uid); // find index of object
          this.sellers.splice(i, 1);
        });
    },
    moment(date) {
      return moment(date);
    },
  },
};
</script>
