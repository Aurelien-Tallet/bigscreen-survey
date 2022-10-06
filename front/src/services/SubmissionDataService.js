import axiosInstance from "@/api";

class SubmissionDataService {
  async get(uuid) {
    return (await axiosInstance.get(`/submission/${uuid}`)).data;
  }
}
export default new SubmissionDataService();
