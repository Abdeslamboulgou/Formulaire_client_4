<template>
  <link
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet"
  />
  <div class="container">
    <h3>Les demandes à venir</h3>
    <div class="col-md-12">
      <div
        class="card b-1 hover-shadow mb-20"
        v-for="user in users"
        :key="user.uid"
      >
        <div class="media card-body">
          <div class="media-left pr-12 text-fade">
            <img
              class="avatar avatar-xl no-radius"
              src="./../../../public/assets/vector-message-icon.jpg"
              alt="..."
            />
          </div>
          <div class="media-body">
            <div class="mb-2">
              <span class="fs-20 pr-16"
                >{{ user.firstName }} {{ user.lastName }}</span
              >
              <div>
                <small class="fs-14 fw-300 ls-1">{{ user.email }}</small>
              </div>
            </div>
            <small class="fs-14 fw-300 ls-1">{{ user.type }}</small>
          </div>
          <div class="media-end pr-12" style="margin-left: 51%">
            <p class="fs-14 text-fade mb-12">
              <i class="fa fa-map-marker"></i> {{ user.city }} ,
              {{ user.codePostal }}
            </p>
            <span class="text-fade">{{ user.adress }}</span>
          </div>
        </div>
        <footer class="card-footer flexbox align-items-center">
          <div class="text-dark">
            <span>{{ user.message }}</span>
          </div>
          <div>
            <strong>Envoyé à: </strong>
            <span>
              {{ moment(user.created_at).format("DD-MM-YYYY h:mm ") }}</span
            >
          </div>
          <div class="card-hover-show">
            <a
              id="botn"
              class="btn btn-xs fs-10 btn-bold"
              href="#"
              data-bs-toggle="modal"
              :data-bs-target="'#MyModal_' + user.uid"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
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
        </footer>
        <div class="btn-group" role="group">
          <div class="modal" :id="'MyModal_' + user.uid">
            <div class="modal-dialog">
              <div class="modal-content">
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                ></button>

                <div class="modal-header">
                  <h3 class="modal-title">
                    Are you want delete the requirement ?
                  </h3>
                </div>

                <div class="modal-footer">
                  <!-- botton confirmation supression d'une salle -->

                  <button
                    class="btn-yes"
                    data-bs-dismiss="modal"
                    @click="deleteRequirement(user.uid)"
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
      <hr />
    </div>
  </div>
</template>
<script>
import moment from "moment";
export default {
  data() {
    return {
      users: [],
    };
  },
  created() {
    axios.get("http://localhost:8000/api/users").then((response) => {
      this.users = response.data.formulaires;
    });
  },
  methods: {
    moment(date) {
      return moment(date);
    },
    deleteRequirement(uid) {
      axios

        .delete("http://localhost:8000/api/delete_user/" + uid)

        .then((response) => {
          let i = this.users.map((item) => item.uid).indexOf(uid); // find index of object

          this.users.splice(i, 1);
        });
    },
  },
};
</script>
