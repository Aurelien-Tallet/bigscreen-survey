import axiosInstance from "@/api";

// Submissions requests helper
class SubmissionDataService {
  async get(uuid) {
    return (await axiosInstance.get(`/submission/${uuid}`)).data;
  }
}
export default new SubmissionDataService();
