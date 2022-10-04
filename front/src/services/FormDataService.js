import axiosInstance from "@/api";

class PairDataService {
  async getAll() {
    return (await axiosInstance.get("/forms")).data;
  }
  async get(id) {
    return (await axiosInstance.get(`/forms/${id}`)).data;
  }
}
export default new PairDataService();
