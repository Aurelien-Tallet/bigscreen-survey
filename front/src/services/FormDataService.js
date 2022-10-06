import axiosInstance from "@/api";

class FormDataService {
  async getAll() {
    return (await axiosInstance.get("/forms")).data;
  }
  async get(id) {
    return (await axiosInstance.get(`/forms/${id}`)).data;
  }
  async submit(data,id) {
    return (await axiosInstance.post(`/forms/${id}`, data)).data;
  }
  async getResponses(id) {
    console.log(id);
    return (await axiosInstance.get(`/data/question/${id}`)).data;
  }
  async getAllSubmissions() {
    return (await axiosInstance.get(`/data`)).data;
  }
}
export default new FormDataService();
