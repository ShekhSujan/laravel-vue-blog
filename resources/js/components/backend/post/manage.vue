<template>
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Manage Post</li>
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
                                <h3 class="card-title">All Posts</h3>
                                <router-link
                                    to="create-post"
                                    class="btn btn-primary btn-sm float-right"
                                    >New Posts</router-link
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
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Thumnails</th>
                                            <th>CreatedBy</th>
                                            <th>CreatedAt</th>
                                            <th>Status</th>
                                            <th style="width:130px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(post, index) in posts"
                                            :key="post.id"
                                        >
                                            <td>
                                                <input
                                                    type="checkbox"
                                                    :value="post.id"
                                                    v-model="selected"
                                                />
                                            </td>
                                            <td>{{ ++index }}</td>
                                            <td>{{ post.category.name }}</td>
                                            <td>{{ post.title }}</td>
                                            <td>
                                                {{
                                                    post.content | subString(10)
                                                }}
                                            </td>
                                            <td>
                                                <img
                                                    width="60px"
                                                    :src="
                                                        fileLink(post.thumnail)
                                                    "
                                                    alt=""
                                                />
                                            </td>
                                            <td>{{ post.user.name }}</td>
                                            <td>
                                                {{ post.created_at | time }}
                                            </td>
                                            <td>
                                                <span
                                                    class="badge"
                                                    :class="
                                                        statusColor(post.status)
                                                    "
                                                >
                                                    {{
                                                        statusName(post.status)
                                                    }}</span
                                                >
                                            </td>
                                            <td>
                                                <router-link
                                                    :to="
                                                        `/edit-post/${post.slug}`
                                                    "
                                                    class="btn btn-warning btn-sm"
                                                    >Edit</router-link
                                                >

                                                <button
                                                    class="btn btn-danger btn-sm"
                                                    type="button"
                                                    @click="remove(post.slug)"
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
                                                                    'published'
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
                                                                    'draft'
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
                                            <td colspan="8">
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
        this.$store.dispatch("getPosts");
    },
    watch: {
        selected: function(selected) {
            this.isSelected = selected.length > 0;
            this.selectedAll = selected.length == this.categories.length;
        }
    },
    computed: {
        posts() {
            return this.$store.getters.posts;
        }
    },
    methods: {
        statusName: function(status) {
            let data = { draft: "draft", published: "published" };
            return data[status];
        },
        statusColor: function(status) {
            let data = { draft: "bg-danger", published: "bg-success" };
            return data[status];
        },
        emptyData: function() {
            return this.posts.length < 1;
        },
        selectAll: function(event) {
            if (event.target.checked == false) {
                this.selected = [];
            } else {
                this.posts.forEach(post => {
                    if (this.selected.indexOf(post.id == -1)) {
                        this.selected.push(post.id);
                    }
                });
            }
        },
        remove: function(slug) {
            this.confirm(() => {
                axios
                    .get("remove-post/" + slug)
                    .then(result => {
                        Swal.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        );
                        this.$store.dispatch("getPosts");
                    })
                    .catch(err => {
                        Swal.fire("Error!", "Some Error Occurs.", "error");
                    });
            });
        },
        removeItems: function(selected) {
            this.confirm(() => {
                axios
                    .post("/posts/remove-items", { data: selected })
                    .then(result => {
                        (this.selected = []),
                            (this.selectedAll = false),
                            (this.isSelected = false),
                            toastr.success("Posts Deleted");
                        this.$store.dispatch("getPosts");
                    })
                    .catch(err => {});
            });
        },
        changeStatus: function(selected, status) {
            axios
                .post("/posts/change-status", {
                    data: selected,
                    status: status
                })
                .then(result => {
                    console.log(result.data);
                    (this.selected = []),
                        (this.selectedAll = false),
                        (this.isSelected = false),
                        toastr.success("Post Updated");
                    this.$store.dispatch("getPosts");
                })
                .catch(err => {});
        }
    }
};
</script>

<style></style>
