<template>
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Category
                            </li>
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
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form @submit.prevent="updateCategory">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    >Category Name</label
                                >
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
                                        <label for="radioPrimary1">
                                            Active
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input
                                            type="radio"
                                            id="inactive"
                                            name="status"
                                            value="0"
                                            v-model="form.status"
                                        />
                                        <label for="radioPrimary2">
                                            Inactive
                                        </label>
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
                                Update Category
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                Reset
                            </button>
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
    data: function() {
        return {
            form: new Form({
                id: "",
                name: "",
                status: ""
            })
        };
    },
    mounted() {
        this.getCategory();
    },
    methods: {
        updateCategory: function() {
            let this_ = this;
            this.form.post("/update-category").then(function(data) {
                Toast.fire({
                    icon: "success",
                    title: "Category Updated successfully"
                });
                this_.$router.push("/categories");
            });
        },
        getCategory: function() {
            const this_ = this;
            axios
                .get("/show-category/" + this.$route.params.id)
                .then(result => {
                    this_.form.fill(result.data.category);
                })
                .catch(err => {});
        }
    }
};
</script>

<style></style>
