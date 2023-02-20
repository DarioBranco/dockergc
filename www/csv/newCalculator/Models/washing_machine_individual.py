from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class washing_machine_individual(Base):
	__tablename__ = 'washing_machine_individual'
	id = Column(Integer, primary_key=True)
	WashID = Column(Text)
	LOC = Column(Text)
	EntryTime = Column(Text)
	ExitTime = Column(Text)
	MakeM = Column(Text)
