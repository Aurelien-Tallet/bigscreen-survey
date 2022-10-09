import axiosInstance from "@/api";

// API requests helper
class PingDataService {
  async ping() {
    return await axiosInstance.get(`/ping`);
  }
}
export default new PingDataService();
