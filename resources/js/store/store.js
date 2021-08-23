export default {
    state: {
        categoryDate: [],
        postDate: []
    },
    getters: {
        categories(state) {
            return state.categoryDate;
        },
        activeCategories(state) {
            return state.categoryDate;
        },
        posts(state) {
            return state.postDate;
        },
        activePosts(state) {
            return state.postDate;
        }
    },
    actions: {
        getCategories(data) {
            //data is a commit
            axios
                .get("/get-categories")
                .then(result => {
                    data.commit("categories", result.data.categories);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getActiveCategories(data) {
            //data is a commit
            axios
                .get("/get-active-categories")
                .then(result => {
                    data.commit("categories", result.data.categories);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        activeCategories(data) {
            //data is a commit
            axios
                .get("/active-categories")
                .then(result => {
                    data.commit("categories", result.data.categories);
                })
                .catch(err => {
                    console.log(err);
                });
        },

        getPosts(data) {
            //data is a commit
            axios
                .get("/get-posts")
                .then(result => {
                    data.commit("posts", result.data.posts);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getActivePosts(data) {
            //data is a commit
            axios
                .get("/get-active-posts")
                .then(result => {
                    data.commit("posts", result.data.posts);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    mutations: {
        categories(state, data) {
            return (state.categoryDate = data);
        },
        posts(state, data) {
            return (state.postDate = data);
        }
    }
};
