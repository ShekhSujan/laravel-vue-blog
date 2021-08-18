<template>
  <div>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Category</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <div class="row">
      <div class="col-md-6 offset-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">New Category</h3>
         <router-link class="btn btn-info btn-sm float-right" to="/categories">All Category</router-link>

          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form @submit.prevent="addCategory">
            <div class="card-body">
              <div class="form-group">
                <input
                  type="text"
                  name="name"
                  v-model="form.name"
                  class="form-control"
                  id="name"
                  placeholder="Enter Name"
                />
                <div
                  v-if="form.errors.has('name')"
                  v-html="form.errors.get('name')"
                />
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <div class="form-group clearfix">
                  <div class="icheck-primary d-inline">
                    <input
                      type="radio"
                      id="active"
                      name="status"
                      value="1"
                      v-model="form.status"
                      checked=""
                    />
                    <label for="radioPrimary1"> Active </label>
                  </div>
                  <div class="icheck-primary d-inline">
                    <input
                      type="radio"
                      id="inactive"
                      name="status"
                      value="0"
                      v-model="form.status"
                    />
                    <label for="radioPrimary2"> Inactive </label>
                  </div>
                  <div
                    v-if="form.errors.has('status')"
                    v-html="form.errors.get('status')"
                  />
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button
                type="submit"
                :disabled="form.busy"
                class="btn btn-primary btn-sm"
              >
                Submit
              </button>
              <button type="reset" class="btn btn-danger btn-sm">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "create",
  data: function () {
    return {
      form: new Form({
        name: "",
        status: "",
      }),
    };
  },
  methods: {
    addCategory: function () {
      let test=this;
      this.form.post("/add-category").then(function (data) {
        // Toast.fire({
        //   icon: "success",
        //   title: "Category Created successfully",
        // });
        toastr.success('Have fun storming the castle!', 'Miracle Max Says')
        test.form.name=null;
       test.form.status=null;
        // test.$router.push('/categories');
      });
    },
  },
};
</script>

<style>
</style>