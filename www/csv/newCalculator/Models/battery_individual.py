from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()

class battery_individual(Base):
	__tablename__ = 'battery_individual'
	id = Column(Integer, primary_key=True)
	BatID = Column(Text)
	LOC = Column(Text)
	EntryTime = Column(Text)
	ExitTime = Column(Text)
	MakeM = Column(Text)
	Year = Column(Text)
	InvMakeM = Column(Text)
	InvNum = Column(Text)
