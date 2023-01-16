import { StringFilter } from "../../util/StringFilter";
import { StringNullableFilter } from "../../util/StringNullableFilter";
import { ProjectListRelationFilter } from "../project/ProjectListRelationFilter";
import { TaskListRelationFilter } from "../task/TaskListRelationFilter";

export type UserWhereInput = {
  firstName?: StringFilter;
  id?: StringFilter;
  lastName?: StringNullableFilter;
  projects?: ProjectListRelationFilter;
  tasks?: TaskListRelationFilter;
  username?: StringFilter;
};
