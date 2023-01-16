import { ProjectUpdateManyWithoutUsersInput } from "./ProjectUpdateManyWithoutUsersInput";
import { InputJsonValue } from "../../types";
import { TaskUpdateManyWithoutUsersInput } from "./TaskUpdateManyWithoutUsersInput";

export type UserUpdateInput = {
  firstName?: string;
  lastName?: string | null;
  password?: string;
  projects?: ProjectUpdateManyWithoutUsersInput;
  roles?: InputJsonValue;
  tasks?: TaskUpdateManyWithoutUsersInput;
  username?: string;
};
