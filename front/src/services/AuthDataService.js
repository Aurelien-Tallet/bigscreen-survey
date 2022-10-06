import axiosInstance from "@/api";

class AuthDataService {
    async login({email, password}) {
        return (await axiosInstance.post("/auth/login", {
            email,
            password
        })).data;
    }
}

export default new AuthDataService();