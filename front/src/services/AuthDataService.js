import axiosInstance from "@/api";

// Authentication requests helper
class AuthDataService {
  async login({ email, password }) {
    return await axiosInstance.post("/auth/login", {
      email,
      password,
    });
  }
}

export default new AuthDataService();
