<template>
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Manage Category
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Categories</h3>
                                <router-link
                                    to="create-category"
                                    class="btn btn-primary btn-sm float-right"
                                    >New Category</router-link
                                >
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input
                                                    :disabled="emptyData()"
                                                    type="checkbox"
                                                    @click="selectAll"
                                                    v-model="selectedAll"
                                                />
                                            </th>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(category,
                                            index) in categories"
                                            :key="category.id"
                                        >
                                            <td>
                                                <input
                                                    type="checkbox"
                                                    :value="category.id"
                                                    v-model="selected"
                                                />
                                            </td>
                                            <td>{{ ++index }}</td>
                                            <td>
                                                {{
                                                    category.name
                                                        | subString(10)
                                                }}
                                            </td>
                                            <td>{{ category.slug }}</td>
                                            <td>
                                                {{ category.created_at | time }}
                                            </td>
                                            <td>
                                                <span
                                                    class="badge"
                                                    :class="
                                                        statusColor(
                                                            category.status
                                                        )
                                                    "
                                                >
                                                    {{
                                                        statusName(
                                                            category.status
                                                        )
                                                    }}</span
                                                >
                                            </td>
                                            <td>
                                                <router-link
                                                    :to="
                                                        `/edit-category/${category.id}`
                                                    "
                                                    class="btn btn-warning btn-sm"
                                                    >Edit</router-link
                                                >

                                                <button
                                                    class="btn btn-danger btn-sm"
                                                    type="button"
                                                    @click="remove(category.id)"
                                                >
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <tr v-if="!emptyData()">
                                            <td colspan="5">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-info dropdown-toggle"
                                                        type="button"
                                                        id="dropdownMenuButton"
                                                        data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        :disabled="!isSelected"
                                                    >
                                                        Action
                                                    </button>
                                                    <div
                                                        class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButton"
                                                    >
                                                        <button
                                                            @click="
                                                                changeStatus(
                                                                    selected,
                                                                    1
                                                                )
                                                            "
                                                            class="dropdown-item"
                                                        >
                                                            Active
                                                        </button>
                                                        <button
                                                            @click="
                                                                changeStatus(
                                                                    selected,
                                                                    0
                                                                )
                                                            "
                                                            class="dropdown-item"
                                                        >
                                                            InActive
                                                        </button>
                                                        <button
                                                            @click="
                                                                removeItems(
                                                                    selected
                                                                )
                                                            "
                                                            class="dropdown-item"
                                                        >
                                                            Remove
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr v-if="emptyData()">
                                            <td colspan="5">
                                                <h5
                                                    class="text-center text-danger"
                                                >
                                                    Data Not Fount
                                                </h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "manage",
    data: function() {
        return {
            selected: [],
            selectedAll: false,
            isSelected: false
        };
    },
    mounted() {
        this.$store.dispatch("getCategories");
    },
    watch: {
        selected: function(selected) {
            this.isSelected = selected.length > 0;
            this.selectedAll = selected.length == this.categories.length;
        }
    },
    computed: {
        categories() {
            return this.$store.getters.categories;
        }
    },
    methods: {
        statusName: function(status) {
            let data = { 0: "Inactive", 1: "Active" };
            return data[status];
        },
        statusColor: function(status) {
            let data = { 0: "bg-danger", 1: "bg-success" };
            return data[status];
        },
        emptyData: function() {
            return this.categories.length < 1;
        },
        selectAll: function(event) {
            if (event.target.checked == false) {
                this.selected = [];
            } else {
                this.categories.forEach(category => {
                    if (this.selected.indexOf(category.id == -1)) {
                        this.selected.push(category.id);
                    }
                });
            }
        },
        remove: function(id) {
            this.confirm(() => {
                axios
                    .get("remove-category/" + id)
                    .then(result => {
                        Swal.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        );
                        this.$store.dispatch("getCategories");
                    })
                    .catch(err => {
                        Swal.fire("Error!", "Some Error Occurs.", "error");
                    });
            });
        },
        removeItems: function(selected) {
            this.confirm(() => {
                axios
                    .post("/categories/remove-items", { data: selected })
                    .then(result => {
                        (this.selected = []),
                            (this.selectedAll = false),
                            (this.isSelected = false),
                            toastr.success("Category Deleted");
                        this.$store.dispatch("getCategories");
                    })
                    .catch(err => {});
            });
        },
        changeStatus: function(selected, status) {
            axios
                .post("/categories/change-status", {
                    data: selected,
                    status: status
                })
                .then(result => {
                    console.log(result.data);
                    (this.selected = []),
                        (this.selectedAll = false),
                        (this.isSelected = false),
                        toastr.success("Category Updated");
                    this.$store.dispatch("getCategories");
                })
                .catch(err => {});
        }
    }
};
</script>
